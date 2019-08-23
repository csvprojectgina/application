<?phpclass csv_info_1_model extends CI_Model {    var $table = "civilservant";    var $select_column = array("civilservant.id", "lastname", "firstname", 'gender', 'mobile_phone', 'current_role_in_khmer','unit.unit');    var $order_column = array(null, "lastname", "firstname", null, null);    function make_query() {        $this->db->select($this->select_column);        $this->db->select('civilservant.id', 'civilservant.lastname,'                . 'civilservant.firstname,'                . 'civilservant.gender,'                . 'civilservant.mobile_phone,'                . 'currentrole.current_role_in_khmer,'                . 'work.unit'            );        $this->db->from($this->table);        $this->db->join('work', 'civilservant.id=work.id', 'inner');        $this->db->join('unit', 'civilservant.unit_code=unit.id', 'inner');        $this->db->join('currentrole', 'currentrole.id=work.current_role_id', 'left');        if (isset($_POST["search"]["value"])) {            $this->db->like("lastname", $_POST["search"]["value"]);            $this->db->or_like("firstname", $_POST["search"]["value"]);            $this->db->or_like("mobile_phone", $_POST["search"]["value"]);            $this->db->or_like("CONCAT(lastname,' ',firstname)", $_POST["search"]["value"]);            $this->db->or_like("current_role_in_khmer", $_POST["search"]["value"]);        }        if (isset($_POST["order"])) {            $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);        } else {            $this->db->order_by('current_role_id', 'asc');        }    }    function make_datatables() {        $this->make_query();        if ($_POST["length"] != -1) {            $this->db->limit($_POST['length'], $_POST['start']);        }        $query = $this->db->get();        return $query->result();    }    function get_filtered_data() {        $this->make_query();        $query = $this->db->get();        return $query->num_rows();    }    function get_all_data() {        $this->db->select("*");        $this->db->from($this->table);        return $this->db->count_all_results();    }}