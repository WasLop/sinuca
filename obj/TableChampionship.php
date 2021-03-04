<?php
class TableChampionship{
    public $id;
    public $name;
    public $ward;
    public $rules;
    public $max_point;
    #public $id_winner;
    public $init_date;
    public $status;

    public function __construct($id_table,
                                    $name_table,
                                    $rules_table,
                                    $ward_table,
                                    $max_point_table,
                                    $init_date_table,
                                    $status_table){
        $this->id = $id_table;

        $this->name = $name_table;
        $this->rules = $rules_table;
        $this->max_point = $max_point_table;
        $this->ward = $ward_table;
        $this->init_date = $init_date_table;
        $this->status = $status_table;

        #$this->get_ward();

    }
    public function get_id(){
        return $this->id;
    }
    public function set_id($id_table){
        $this->id = $id_table;
    }
    public function get_name(){
        
        return $this->name;
    }
    public function set_name($name_table){
        $this->name = $name_table;
    }
    public function get_max_point(){
        return $this->max_point;
    }
    public function set_max_point($max_point_table){
        $this->max_point = $max_point_table;
    }
    public function get_rules(){
        return $this->rules;
    }
    public function set_rules($rules_table){
        $this->rules = $rules_table;
    }
    public function get_ward(){
        return $this->ward;
    }
    public function set_ward($ward_table){
        $this->ward = $ward_table;
    }

    public function get_init_date(){
        return $this->init_date;
    }
    public function set_init_date($init_date_table){
        $this->init_date = $init_date_table;
    }
    public function status_date(){
        return $this->status;
    }
    public function set_status($status_table){
        $this->status = $status_table;
    }



}
?>