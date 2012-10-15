<?php
class Controller_Kaumono_Rest extends Controller_Rest
{
    public function get_list()
    {
        $data = Model_Kaumono::find('all');
        $this->response($data);
    }
}
?>