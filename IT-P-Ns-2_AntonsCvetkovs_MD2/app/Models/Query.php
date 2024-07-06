<?php

namespace app\Models;

class Query extends Database // si klase atbild par sql scripta izveidei
{
	private string $query = '';
	private Model $model;

	public function __construct(Model $model)
	{
		parent::__construct(); // piesladzamies datu bazei
		$this->model = $model;
	}
	// select funkcija atbild par SELECT pievienosanu skriptam
	public function select(string $table = null, array $columns = null): self
	{
		// ja $columns argumenta vertiba ir tuksa, tad SELECT visas kolonnas,
		// ja otradak, tad tikai tos, kuras ir noraditas
		$select = is_null($columns) ? '*' : implode(', ', $columns);
		// ja tabulas nosaukums nav padots, tad izmantojom tabulu noradito Modelii
		$table ??= $this->model->table();

		$this->query .= "SELECT $select FROM $table";

		return $this;
	}
	// where funkcija atbild par WHERE pievienosanu skriptam
	public function where(string $column, string $operator, $value): self
	{
		if ($operator == 'like' || $operator == 'LIKE') {
			// ja operators ir like, tad pievienojam '' apkart vertibai
			// jo LIKE strada ar tekstu
			$value = "'$value'";
		}
		// ja operators ir IN, tad prabaudam, vai $value ir masivs
		// ja jaa, tad sadalam to string un pievienojam ()
		if ($operator == 'IN') {
			$value = is_array($value) ? implode(', ', $value) : $value;

			if (!str_starts_with($value, '(')) {
				$value = "($value";
			}

			if (!str_ends_with($value, ')')) {
				$value .= ')';
			}
		}

		$this->query .= " WHERE $column $operator $value";

		return $this;
	}
	// orderBy funkcija atbild par ORDER BY pievienosanu skriptam
	public function orderBy(string $column, string $order = 'ASC'): self
	{
		$this->query .= " ORDER BY $column $order";
		return $this;
	}
	// get funkcija atgriez masivu ar visiem SQL skripta rezultatiem
	public function get(): array
	{
		// izpildam srkiptu
		$result = $this->connection()->query($this->query);
		// visus rezultatus pievienojam masivaa
		while ($row = mysqli_fetch_assoc($result)) {
			$rows[] = $row;
		}

		return $rows ?? [];
	}
	// pivot funkcija atgriez ierakstus no tabulas, kas tika izveidota many-to-many relacijaa
	public function pivot($value = null): array
	{
		$pivot_table = $this->model->pivot_table();
		$pivot_column = $this->model->pivot_column();

		$sql = $this->select($pivot_table);

		if (!is_null($value)) {
			$sql->where("$pivot_table.$pivot_column", '=', $value);
		}

		return $sql->get();
	}

}