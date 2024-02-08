<?php

class EvaluationController
{
    public function __construct($csvname = "/var/www/html/evaluation.csv")
    {
        $this->csvname = $csvname;
        $df = fopen($csvname, "r");
        $row = fgetcsv($df);
        $this->cols = $row;
        $this->model = array();
        $this->codes = array();
        while ($row = fgetcsv($df)) {
            $this->model[] = $row;
            $this->codes[] = $row[0];
        }
    }

    public function get(string $code, string $mov_id)
    {
        $code_idx = $this->getCode($code);
        $mov_idx = $this->getCol($mov_id);
        return $this->model[$code_idx][$mov_idx];
    }

    public function getCode(string $code)
    {
        $code_idx = array_search($code, $this->codes);
        if ($code_idx===false) {
            $this->makeCode($code);
            $code_idx = array_search($code, $this->codes);
        }
        return $code_idx;
    }

    public function getCol(string $mov_id)
    {
        $value_idx = array_search($mov_id, $this->cols);
        if ($value_idx===false) {
            $this->makeCol($mov_id);
            $value_idx = array_search($mov_id, $this->cols);
        }
        return $value_idx;
    }

    public function set(string $code, string $mov_id, string $value) {
        $code_idx = $this->getCode($code);
        $mov_idx = $this->getCol($mov_id);
        $this->model[$code_idx][$mov_idx] = $value;
        $this->_set();
    }

    private function _set()
    {
        $fw = fopen($this->csvname, "w");
        fputcsv($fw, $this->cols);
        foreach ($this->model as &$row) {
            fputcsv($fw, $row);
        }
        fclose($fw);
    }

    public function makeCode(string $code)
    {
        if (array_search($code, $this->codes)!==false) {
            return false;
        }
        $row_new = array($code);
        for ($i=0;$i<count($this->cols) - 1;$i++) {
            array_push($row_new, "");
        }
        array_push($this->model, $row_new);
        $this->_set();
        return true;
    }

    public function makeCol(string $mov_id)
    {
        if (array_search($mov_id, $this->cols)!==false) {
            return false;
        }
        $this->cols[] = $mov_id;
        foreach ($this->model as &$row) {
            array_push($row, "");
        }
        $this->_set();
        return true;
    }
}
