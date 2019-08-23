<?php



if (!defined('BASEPATH'))

    exit('No direct script access allowed');



class Csv_report extends Admin_Controller

{

    // index ===============

    public function index()

    {

        // select unit ==========

        $query_wh = query("SELECT DISTINCT unit,id  FROM unit WHERE status='1' ");

        $row_pp = $query_wh->result();

        $data['pro_pp'] = $row_pp;

        // select civilservant ==========

        $query_wh = query("SELECT

							(	SELECT DISTINCT

									COUNT(`work`.id)

								FROM

									`work`

								INNER JOIN civilservant ON civilservant.id = `work`.id

							) AS c_id,

							count(gender) AS female

						FROM

							civilservant

						INNER JOIN `work` ON `work`.id = civilservant.id


						AND gender = 'ស្រី'");

        $row_unit = $query_wh->result();

        $data['pro_civ'] = $row_unit;

        // Phnom Penh ==========

        $query_wh = query("	SELECT

								(
									SELECT DISTINCT

										COUNT(`work`.id)

									FROM

										`work`

									INNER JOIN civilservant ON civilservant.id = `work`.id

									WHERE

										unit = '1'

								) AS c_id,

								count(gender) AS gender

							FROM

								civilservant

							INNER JOIN `work` ON `work`.id = civilservant.id

							WHERE

								gender = 'ស្រី'

							AND unit = '1' ");

        $pro_phnom = $query_wh->result();

        $data['pro_phnom'] = $pro_phnom;



        // Bonteay Meanchey ==========

        $query_wh = query("SELECT

						(

							SELECT DISTINCT

								COUNT(`work`.id)

							FROM

								`work`

							INNER JOIN civilservant ON civilservant.id = `work`.id

							WHERE

								unit = '2'

						) AS c_id,

						count(gender) AS gender

					FROM

						civilservant

					INNER JOIN `work` ON `work`.id = civilservant.id

					WHERE

						gender = 'ស្រី'

					AND unit = '2' ");

        $pro_bonteay = $query_wh->result();

        $data['pro_bonteay'] = $pro_bonteay;



        // Battom bong ==========

        $query_wh = query("SELECT

							(

								SELECT DISTINCT

									COUNT(`work`.id)

								FROM

									`work`

								INNER JOIN civilservant ON civilservant.id = `work`.id

								WHERE

									unit = '3'

							) AS c_id,

							count(gender) AS gender

						FROM

							civilservant

						INNER JOIN `work` ON `work`.id = civilservant.id

						WHERE

							gender = 'ស្រី'

						AND unit = '3' ");

        $pro_batdb = $query_wh->result();

        $data['pro_batdb'] = $pro_batdb;



        // Kom Pong cham ==========

        $query_wh = query("SELECT

								(

									SELECT DISTINCT

										COUNT(`work`.id)

									FROM

										`work`

									INNER JOIN civilservant ON civilservant.id = `work`.id

									WHERE

										unit = '4'

								) AS c_id,

								count(gender) AS gender

							FROM

								civilservant

							INNER JOIN `work` ON `work`.id = civilservant.id

							WHERE

								gender = 'ស្រី'

							AND unit = '4' ");

        $pro_kom_pch = $query_wh->result();

        $data['pro_kom_pch'] = $pro_kom_pch;

        // Kom Pong chnang ==========

        $query_wh = query("SELECT

							(

								SELECT DISTINCT

									COUNT(`work`.id)

								FROM

									`work`

								INNER JOIN civilservant ON civilservant.id = `work`.id

								WHERE

									unit = '5'

							) AS c_id,

							count(gender) AS gender

						FROM

							civilservant

						INNER JOIN `work` ON `work`.id = civilservant.id

						WHERE

							gender = 'ស្រី'

						AND unit = '5' ");

        $pro_kom_pchn = $query_wh->result();

        $data['pro_kom_pchn'] = $pro_kom_pchn;

        // ខេត្តកំពុងស្ពឺ​ Kom pong spuer ==========

        $query_wh = query("	SELECT

								(

									SELECT DISTINCT

										COUNT(`work`.id)

									FROM

										`work`

									INNER JOIN civilservant ON civilservant.id = `work`.id

									WHERE

										unit = '6'

								) AS c_id,

								count(gender) AS gender

							FROM

								civilservant

							INNER JOIN `work` ON `work`.id = civilservant.id

							WHERE

								gender = 'ស្រី'

							AND unit = '6' ");

        $pro_kom_psp = $query_wh->result();

        $data['pro_kom_psp'] = $pro_kom_psp;

        //  Kom pong thom ==========

        $query_wh = query("	SELECT

								(

									SELECT DISTINCT

										COUNT(`work`.id)

									FROM

										`work`

									INNER JOIN civilservant ON civilservant.id = `work`.id

									WHERE

										unit = '7'

								) AS c_id,

								count(gender) AS gender

							FROM

								civilservant

							INNER JOIN `work` ON `work`.id = civilservant.id

							WHERE

								gender = 'ស្រី'

							AND unit = '7' ");

        $pro_kom_pth = $query_wh->result();

        $data['pro_kom_pth'] = $pro_kom_pth;

        // Kom pot ==========

        $query_wh = query("SELECT

								(

									SELECT DISTINCT

										COUNT(`work`.id)

									FROM

										`work`

									INNER JOIN civilservant ON civilservant.id = `work`.id

									WHERE

										unit = '8'

								) AS c_id,

								count(gender) AS gender

							FROM

								civilservant

							INNER JOIN `work` ON `work`.id = civilservant.id

							WHERE

								gender = 'ស្រី'

							AND unit = '8' ");

        $row_kp = $query_wh->result();

        $data['pro_kp'] = $row_kp;

        // Kon dal ==========

        $query_wh = query("SELECT

							(

								SELECT DISTINCT

									COUNT(`work`.id)

								FROM

									`work`

								INNER JOIN civilservant ON civilservant.id = `work`.id

								WHERE

									unit = '9'

							) AS c_id,

							count(gender) AS gender

						FROM

							civilservant

						INNER JOIN `work` ON `work`.id = civilservant.id

						WHERE

							gender = 'ស្រី'

						AND unit = '9' ");

        $row_kd = $query_wh->result();

        $data['pro_kd'] = $row_kd;

        // Kep ==========

        $query_wh = query("SELECT

								(

									SELECT DISTINCT

										COUNT(`work`.id)

									FROM

										`work`

									INNER JOIN civilservant ON civilservant.id = `work`.id

									WHERE

										unit = '10'

								) AS c_id,

								count(gender) AS gender

							FROM

								civilservant

							INNER JOIN `work` ON `work`.id = civilservant.id

							WHERE

								gender = 'ស្រី'

							AND unit = '10' ");

        $row_kep = $query_wh->result();

        $data['pro_kep'] = $row_kep;

        // Koh kong ==========

         $query_wh = query("SELECT

								(

									SELECT DISTINCT

										COUNT(`work`.id)

									FROM

										`work`

									INNER JOIN civilservant ON civilservant.id = `work`.id

									WHERE

										unit = '11'

								) AS c_id,

								count(gender) AS gender

							FROM

								civilservant

							INNER JOIN `work` ON `work`.id = civilservant.id

							WHERE

								gender = 'ស្រី'

							AND unit = '11' ");

        $pro_kk = $query_wh->result();

        $data['pro_kk'] = $pro_kk;

        // krojes ==========

        $query_wh = query("SELECT

							(

								SELECT DISTINCT

									COUNT(`work`.id)

								FROM

									`work`

								INNER JOIN civilservant ON civilservant.id = `work`.id

								WHERE

									unit = '12'

							) AS c_id,

							count(gender) AS gender

						FROM

							civilservant

						INNER JOIN `work` ON `work`.id = civilservant.id

						WHERE

							gender = 'ស្រី'

						AND unit = '12' ");

        $pro_kj = $query_wh->result();

        $data['pro_kj'] = $pro_kj;

        // Mondolkiry ==========

        $query_wh = query("SELECT

								(

									SELECT DISTINCT

										COUNT(`work`.id)

									FROM

										`work`

									INNER JOIN civilservant ON civilservant.id = `work`.id

									WHERE

										unit = '13'

								) AS c_id,

								count(gender) AS gender

							FROM

								civilservant

							INNER JOIN `work` ON `work`.id = civilservant.id

							WHERE

								gender = 'ស្រី'

							AND unit = '13' ");

        $row_mondkr = $query_wh->result();

        $data['pro_mondkr'] = $row_mondkr;

        // Udor mean Chey ==========

        $query_wh = query("SELECT

								(

									SELECT DISTINCT

										COUNT(`work`.id)

									FROM

										`work`

									INNER JOIN civilservant ON civilservant.id = `work`.id

									WHERE

										unit = '14'

								) AS c_id,

								count(gender) AS gender

							FROM

								civilservant

							INNER JOIN `work` ON `work`.id = civilservant.id

							WHERE

								gender = 'ស្រី'

							AND unit = '14' ");

        $row_udormch = $query_wh->result();

        $data['pro_udormch'] = $row_udormch;

        // BiyLin ==========

        $query_wh = query("SELECT

								(

									SELECT DISTINCT

										COUNT(`work`.id)

									FROM

										`work`

									INNER JOIN civilservant ON civilservant.id = `work`.id

									WHERE

										unit = '15'

								) AS c_id,

								count(gender) AS gender

							FROM

								civilservant

							INNER JOIN `work` ON `work`.id = civilservant.id

							WHERE

								gender = 'ស្រី'

							AND unit = '15' ");

        $row_piylen = $query_wh->result();

        $data['pro_piylen'] = $row_piylen;

        // Sihunok ==========

        $query_wh = query("SELECT

								(

									SELECT DISTINCT

										COUNT(`work`.id)

									FROM

										`work`

									INNER JOIN civilservant ON civilservant.id = `work`.id

									WHERE

										unit = '16'

								) AS c_id,

								count(gender) AS gender

							FROM

								civilservant

							INNER JOIN `work` ON `work`.id = civilservant.id

							WHERE

								gender = 'ស្រី'

							AND unit = '16' ");

        $row_shn = $query_wh->result();

        $data['pro_shn'] = $row_shn;

        // Preas Vihea ==========

        $query_wh = query("SELECT

								(

									SELECT DISTINCT

										COUNT(`work`.id)

									FROM

										`work`

									INNER JOIN civilservant ON civilservant.id = `work`.id

									WHERE

										unit = '17'

								) AS c_id,

								count(gender) AS gender

							FROM

								civilservant

							INNER JOIN `work` ON `work`.id = civilservant.id

							WHERE

								gender = 'ស្រី'

							AND unit = '17' ");

        $row_prhear = $query_wh->result();

        $data['pro_prhear'] = $row_prhear;

        // Prey Veng ==========

        $query_wh = query("SELECT

							(

								SELECT DISTINCT

									COUNT(`work`.id)

								FROM

									`work`

								INNER JOIN civilservant ON civilservant.id = `work`.id

								WHERE

									unit = '18'

							) AS c_id,

							count(gender) AS gender

						FROM

							civilservant

						INNER JOIN `work` ON `work`.id = civilservant.id

						WHERE

							gender = 'ស្រី'

						AND unit = '18' ");

        $row_piveng = $query_wh->result();

        $data['pro_prveng'] = $row_piveng;

        // Pou sat ==========

        $query_wh = query("SELECT

								(

									SELECT DISTINCT

										COUNT(`work`.id)

									FROM

										`work`

									INNER JOIN civilservant ON civilservant.id = `work`.id

									WHERE

										unit = '19'

								) AS c_id,

								count(gender) AS gender

							FROM

								civilservant

							INNER JOIN `work` ON `work`.id = civilservant.id

							WHERE

								gender = 'ស្រី'

							AND unit = '19' ");

        $row_posat = $query_wh->result();

        $data['pro_posat'] = $row_posat;

        // Rathanakiry ==========

        $query_wh = query("SELECT 
								(

									SELECT DISTINCT

										COUNT(`work`.id)

									FROM

										`work`

									INNER JOIN civilservant ON civilservant.id = `work`.id

									WHERE

										unit = '20'

								) AS c_id,

								count(gender) AS gender

							FROM

								civilservant

							INNER JOIN `work` ON `work`.id = civilservant.id

							WHERE

								gender = 'ស្រី'

							AND unit = '20' ");

        $row_rtnkr = $query_wh->result();

        $data['pro_rtnkr'] = $row_rtnkr;

        // Seam Reap ==========

        $query_wh = query("SELECT

								(

									SELECT DISTINCT

										COUNT(`work`.id)

									FROM

										`work`

									INNER JOIN civilservant ON civilservant.id = `work`.id

									WHERE

										unit = '21'

								) AS c_id,

								count(gender) AS gender

							FROM

								civilservant

							INNER JOIN `work` ON `work`.id = civilservant.id

							WHERE

								gender = 'ស្រី'

							AND unit = '21' ");

        $row_sr = $query_wh->result();

        $data['pro_sr'] = $row_sr;

        // steng treng ==========

        $query_wh = query("SELECT 
								(

									SELECT DISTINCT

										COUNT(`work`.id)

									FROM

										`work`

									INNER JOIN civilservant ON civilservant.id = `work`.id

									WHERE

										unit = '22'

								) AS c_id,

								count(gender) AS gender

							FROM

								civilservant

							INNER JOIN `work` ON `work`.id = civilservant.id

							WHERE

								gender = 'ស្រី'

							AND unit = '22' ");

        $row_streng = $query_wh->result();

        $data['pro_streng'] = $row_streng;

        // sviy reang ==========

        $query_wh = query("SELECT

								(

									SELECT DISTINCT

										COUNT(`work`.id)

									FROM

										`work`

									INNER JOIN civilservant ON civilservant.id = `work`.id

									WHERE

										unit = '23'

								) AS c_id,

								count(gender) AS gender

							FROM

								civilservant

							INNER JOIN `work` ON `work`.id = civilservant.id

							WHERE

								gender = 'ស្រី'

							AND unit = '23' ");

        $row_svr = $query_wh->result();

        $data['pro_svr'] = $row_svr;

        // Takeo ==========

        $query_wh = query("SELECT

								(

									SELECT DISTINCT

										COUNT(`work`.id)

									FROM

										`work`

									INNER JOIN civilservant ON civilservant.id = `work`.id

									WHERE

										unit = '24'

								) AS c_id,

								count(gender) AS gender

							FROM

								civilservant

							INNER JOIN `work` ON `work`.id = civilservant.id

							WHERE

								gender = 'ស្រី'

							AND unit = '24' ");

        $row_tk = $query_wh->result();

        $data['pro_tk'] = $row_tk;

        // tbong Kmom ==========

        $query_wh = query("SELECT

								(

									SELECT DISTINCT

										COUNT(`work`.id)

									FROM

										`work`

									INNER JOIN civilservant ON civilservant.id = `work`.id

									WHERE

										unit = '25'

								) AS c_id,

								count(gender) AS gender

							FROM

								civilservant

							INNER JOIN `work` ON `work`.id = civilservant.id

							WHERE

								gender = 'ស្រី'

							AND unit = '25' ");

        $row_tkm = $query_wh->result();

        $data['pro_tkm'] = $row_tkm;

        //  Phnom Penh Provincial Department==========

        $query_wh = query("SELECT

								(

									SELECT DISTINCT

										COUNT(`work`.id)

									FROM

										`work`

									INNER JOIN civilservant ON civilservant.id = `work`.id

									WHERE

										unit = '31'

								) AS c_id,

								count(gender) AS gender

							FROM

								civilservant

							INNER JOIN `work` ON `work`.id = civilservant.id

							WHERE

								gender = 'ស្រី'

							AND unit = '31' ");

        $row_pp_pd = $query_wh->result();

        $data['pro_pp_pd'] = $row_pp_pd;



        $this->load->view('header');

        $this->load->view('csv/csv_report/index', $data);

        $this->load->view('footer');

    }



    public function print_biology()

    {

        $id = $this->input->post('id');

        $data['id'] = $id;

        $this->load->view('csv/csv_report/printprofile', $data);

    }



    public function pdf()

    {

        // select unit ==========

        $query_wh = query("SELECT DISTINCT unit,id  FROM unit WHERE status='1' ");

        $row_pp = $query_wh->result();

        $data['pro_pp'] = $row_pp;

        // select civilservant ==========

        $query_wh = query("SELECT

							(

								SELECT DISTINCT

									COUNT(`work`.id)

								FROM

									`work`

								INNER JOIN civilservant ON civilservant.id = `work`.id



							) AS c_id,

							count(gender) AS female

						FROM

							civilservant

						INNER JOIN `work` ON `work`.id = civilservant.id



						AND gender = 'ស្រី'");

        $row_unit = $query_wh->result();

        $data['pro_civ'] = $row_unit;

        // Phnom Ponh ==========

        $query_wh = query("SELECT

						(	SELECT DISTINCT

										COUNT(`work`.id)

									FROM

										`work`

									INNER JOIN civilservant ON civilservant.id = `work`.id

									WHERE

										unit = '1'

								) AS c_id,

								count(gender) AS gender

							FROM

								civilservant

							INNER JOIN `work` ON `work`.id = civilservant.id

							WHERE

								gender = 'ស្រី'

							AND unit = '1' ");

        $pro_phnom = $query_wh->result();

        $data['pro_phnom'] = $pro_phnom;



        // Bonteay Meanchey ==========

        $query_wh = query("SELECT

							(

								SELECT DISTINCT

									COUNT(`work`.id)

								FROM

									`work`

								INNER JOIN civilservant ON civilservant.id = `work`.id

								WHERE

									unit = '2'

							) AS c_id,

							count(gender) AS gender

						FROM

							civilservant

						INNER JOIN `work` ON `work`.id = civilservant.id

						WHERE

							gender = 'ស្រី'

						AND unit = '2' ");

        $pro_bonteay = $query_wh->result();

        $data['pro_bonteay'] = $pro_bonteay;



        // Battom bong ==========

        $query_wh = query("SELECT

						(

							SELECT DISTINCT

								COUNT(`work`.id)

							FROM

								`work`

							INNER JOIN civilservant ON civilservant.id = `work`.id

							WHERE

								unit = '3'

						) AS c_id,

						count(gender) AS gender

					FROM

						civilservant

					INNER JOIN `work` ON `work`.id = civilservant.id

					WHERE

						gender = 'ស្រី'

					AND unit = '3' ");

        $pro_batdb = $query_wh->result();

        $data['pro_batdb'] = $pro_batdb;



        // Kom Pong cham ==========

        $query_wh = query("SELECT

						(

							SELECT DISTINCT

								COUNT(`work`.id)

							FROM

								`work`

							INNER JOIN civilservant ON civilservant.id = `work`.id

							WHERE

								unit = '4'

						) AS c_id,

						count(gender) AS gender

					FROM

						civilservant

					INNER JOIN `work` ON `work`.id = civilservant.id

					WHERE

						gender = 'ស្រី'

					AND unit = '4' ");

        $pro_kom_pch = $query_wh->result();

        $data['pro_kom_pch'] = $pro_kom_pch;

        // Kom Pong chnang ==========

        $query_wh = query("SELECT

							(

								SELECT DISTINCT

									COUNT(`work`.id)

								FROM

									`work`

								INNER JOIN civilservant ON civilservant.id = `work`.id

								WHERE

									unit = '5'

							) AS c_id,

							count(gender) AS gender

						FROM

							civilservant

						INNER JOIN `work` ON `work`.id = civilservant.id

						WHERE

							gender = 'ស្រី'

						AND unit = '5' ");

        $pro_kom_pchn = $query_wh->result();

        $data['pro_kom_pchn'] = $pro_kom_pchn;

        // ខេត្តកំពុងស្ពឺ​ Kom pong spuer ==========

        $query_wh = query("SELECT

								(

									SELECT DISTINCT

										COUNT(`work`.id)

									FROM

										`work`

									INNER JOIN civilservant ON civilservant.id = `work`.id

									WHERE

										unit = '6'

								) AS c_id,

								count(gender) AS gender

							FROM

								civilservant

							INNER JOIN `work` ON `work`.id = civilservant.id

							WHERE

								gender = 'ស្រី'

							AND unit = '6' ");

        $pro_kom_psp = $query_wh->result();

        $data['pro_kom_psp'] = $pro_kom_psp;

        //  Kom pong thom ==========

        $query_wh = query("SELECT

								(

									SELECT DISTINCT

										COUNT(`work`.id)

									FROM

										`work`

									INNER JOIN civilservant ON civilservant.id = `work`.id

									WHERE

										unit = '7'

								) AS c_id,

								count(gender) AS gender

							FROM

								civilservant

							INNER JOIN `work` ON `work`.id = civilservant.id

							WHERE

								gender = 'ស្រី'

							AND unit = '7' ");

        $pro_kom_pth = $query_wh->result();

        $data['pro_kom_pth'] = $pro_kom_pth;

        // Kom pot ==========

        $query_wh = query("SELECT

							(

								SELECT DISTINCT

									COUNT(`work`.id)

								FROM

									`work`

								INNER JOIN civilservant ON civilservant.id = `work`.id

								WHERE

									unit = '8'

							) AS c_id,

							count(gender) AS gender

						FROM

							civilservant

						INNER JOIN `work` ON `work`.id = civilservant.id

						WHERE

							gender = 'ស្រី'

						AND unit = '8' ");

        $row_kp = $query_wh->result();

        $data['pro_kp'] = $row_kp;

        // Kon dal ==========

        $query_wh = query("SELECT

								(

									SELECT DISTINCT

										COUNT(`work`.id)

									FROM

										`work`

									INNER JOIN civilservant ON civilservant.id = `work`.id

									WHERE

										unit = '9'

								) AS c_id,

								count(gender) AS gender

							FROM

								civilservant

							INNER JOIN `work` ON `work`.id = civilservant.id

							WHERE

								gender = 'ស្រី'

							AND unit = '9' ");

        $row_kd = $query_wh->result();

        $data['pro_kd'] = $row_kd;

        // Kep ==========

        $query_wh = query("SELECT

							(

								SELECT DISTINCT

									COUNT(`work`.id)

								FROM

									`work`

								INNER JOIN civilservant ON civilservant.id = `work`.id

								WHERE

									unit = '10'

							) AS c_id,

							count(gender) AS gender

						FROM

							civilservant

						INNER JOIN `work` ON `work`.id = civilservant.id

						WHERE

							gender = 'ស្រី'

						AND unit = '10' ");

        $row_kep = $query_wh->result();

        $data['pro_kep'] = $row_kep;

        // Koh kong ==========

        $query_wh =query("SELECT

								(

									SELECT DISTINCT

										COUNT(`work`.id)

									FROM

										`work`

									INNER JOIN civilservant ON civilservant.id = `work`.id

									WHERE

										unit = '11'

								) AS c_id,

								count(gender) AS gender

							FROM

								civilservant

							INNER JOIN `work` ON `work`.id = civilservant.id

							WHERE

								gender = 'ស្រី'

							AND unit = '11' ");

        $pro_kk = $query_wh->result();

        $data['pro_kk'] = $pro_kk;

        // krojes ==========

        $query_wh = query("SELECT

							(

								SELECT DISTINCT

									COUNT(`work`.id)

								FROM

									`work`

								INNER JOIN civilservant ON civilservant.id = `work`.id

								WHERE

									unit = '12'

							) AS c_id,

							count(gender) AS gender

						FROM

							civilservant

						INNER JOIN `work` ON `work`.id = civilservant.id

						WHERE

							gender = 'ស្រី'

						AND unit = '12' ");

        $pro_kj = $query_wh->result();

        $data['pro_kj'] = $pro_kj;

        // Mondolkiry ==========

        $query_wh = query("SELECT

							(

								SELECT DISTINCT

									COUNT(`work`.id)

								FROM

									`work`

								INNER JOIN civilservant ON civilservant.id = `work`.id

								WHERE

									unit = '13'

							) AS c_id,

							count(gender) AS gender

						FROM

							civilservant

						INNER JOIN `work` ON `work`.id = civilservant.id

						WHERE

							gender = 'ស្រី'

						AND unit = '13' ");

        $row_mondkr = $query_wh->result();

        $data['pro_mondkr'] = $row_mondkr;

        // Udor mean Chey ==========

        $query_wh = query("SELECT

								(

									SELECT DISTINCT

										COUNT(`work`.id)

									FROM

										`work`

									INNER JOIN civilservant ON civilservant.id = `work`.id

									WHERE

										unit = '14'

								) AS c_id,

								count(gender) AS gender

							FROM

								civilservant

							INNER JOIN `work` ON `work`.id = civilservant.id

							WHERE

								gender = 'ស្រី'

							AND unit = '14' ");

        $row_udormch = $query_wh->result();

        $data['pro_udormch'] = $row_udormch;

        // BiyLin ==========

        $query_wh = query("SELECT

							(

								SELECT DISTINCT

									COUNT(`work`.id)

								FROM

									`work`

								INNER JOIN civilservant ON civilservant.id = `work`.id

								WHERE

									unit = '15'

							) AS c_id,

							count(gender) AS gender

						FROM

							civilservant

						INNER JOIN `work` ON `work`.id = civilservant.id

						WHERE

							gender = 'ស្រី'

						AND unit = '15' ");

        $row_piylen = $query_wh->result();

        $data['pro_piylen'] = $row_piylen;

        // Sihunok ==========

        $query_wh = query("SELECT

						(

							SELECT DISTINCT

								COUNT(`work`.id)

							FROM

								`work`

							INNER JOIN civilservant ON civilservant.id = `work`.id

							WHERE

								unit = '16'

						) AS c_id,

						count(gender) AS gender

					FROM

						civilservant

					INNER JOIN `work` ON `work`.id = civilservant.id

					WHERE

						gender = 'ស្រី'

					AND unit = '16' ");

        $row_shn = $query_wh->result();

        $data['pro_shn'] = $row_shn;

        // Preas Vihea ==========

        $query_wh = query("SELECT

							(

								SELECT DISTINCT

									COUNT(`work`.id)

								FROM

									`work`

								INNER JOIN civilservant ON civilservant.id = `work`.id

								WHERE

									unit = '17'

							) AS c_id,

							count(gender) AS gender

						FROM

							civilservant

						INNER JOIN `work` ON `work`.id = civilservant.id

						WHERE

							gender = 'ស្រី'

						AND unit = '17' ");

        $row_prhear = $query_wh->result();

        $data['pro_prhear'] = $row_prhear;

        // Prey Veng ==========

        $query_wh = query("SELECT

							(

								SELECT DISTINCT

									COUNT(`work`.id)

								FROM

									`work`

								INNER JOIN civilservant ON civilservant.id = `work`.id

								WHERE

									unit = '18'

							) AS c_id,

							count(gender) AS gender

						FROM

							civilservant

						INNER JOIN `work` ON `work`.id = civilservant.id

						WHERE

							gender = 'ស្រី'

						AND unit = '18' ");

        $row_piveng = $query_wh->result();

        $data['pro_prveng'] = $row_piveng;

        // Pou sat ==========

        $query_wh = query("SELECT

							(

								SELECT DISTINCT

									COUNT(`work`.id)

								FROM

									`work`

								INNER JOIN civilservant ON civilservant.id = `work`.id

								WHERE

									unit = '19'

							) AS c_id,

							count(gender) AS gender

						FROM

							civilservant

						INNER JOIN `work` ON `work`.id = civilservant.id

						WHERE

							gender = 'ស្រី'

						AND unit = '19' ");

        $row_posat = $query_wh->result();

        $data['pro_posat'] = $row_posat;

        // Rathanakiry ==========

        $query_wh = query("SELECT

							(

								SELECT DISTINCT

									COUNT(`work`.id)

								FROM

									`work`

								INNER JOIN civilservant ON civilservant.id = `work`.id

								WHERE

									unit = '20'

							) AS c_id,

							count(gender) AS gender

						FROM

							civilservant

						INNER JOIN `work` ON `work`.id = civilservant.id

						WHERE

							gender = 'ស្រី'

						AND unit = '20' ");

        $row_rtnkr = $query_wh->result();

        $data['pro_rtnkr'] = $row_rtnkr;

        // Seam Reap ==========

        $query_wh = query("SELECT

							(

								SELECT DISTINCT

									COUNT(`work`.id)

								FROM

									`work`

								INNER JOIN civilservant ON civilservant.id = `work`.id

								WHERE

									unit = '21'

							) AS c_id,

							count(gender) AS gender

						FROM

							civilservant

						INNER JOIN `work` ON `work`.id = civilservant.id

						WHERE

							gender = 'ស្រី'

						AND unit = '21' ");

        $row_sr = $query_wh->result();

        $data['pro_sr'] = $row_sr;

        // steng treng ==========

        $query_wh = query("SELECT

							(

								SELECT DISTINCT

									COUNT(`work`.id)

								FROM

									`work`

								INNER JOIN civilservant ON civilservant.id = `work`.id

								WHERE

									unit = '22'

							) AS c_id,

							count(gender) AS gender

						FROM

							civilservant

						INNER JOIN `work` ON `work`.id = civilservant.id

						WHERE

							gender = 'ស្រី'

						AND unit = '22' ");

        $row_streng = $query_wh->result();

        $data['pro_streng'] = $row_streng;

        // sviy reang ==========

        $query_wh = query("SELECT

							(

								SELECT DISTINCT

									COUNT(`work`.id)

								FROM

									`work`

								INNER JOIN civilservant ON civilservant.id = `work`.id

								WHERE

									unit = '23'

							) AS c_id,

							count(gender) AS gender

						FROM

							civilservant

						INNER JOIN `work` ON `work`.id = civilservant.id

						WHERE

							gender = 'ស្រី'

						AND unit = '23' ");

        $row_svr = $query_wh->result();

        $data['pro_svr'] = $row_svr;

        // Takeo ==========

        $query_wh = query("SELECT

								(

									SELECT DISTINCT

										COUNT(`work`.id)

									FROM

										`work`

									INNER JOIN civilservant ON civilservant.id = `work`.id

									WHERE

										unit = '24'

								) AS c_id,

								count(gender) AS gender

							FROM

								civilservant

							INNER JOIN `work` ON `work`.id = civilservant.id

							WHERE

								gender = 'ស្រី'

							AND unit = '24' ");

        $row_tk = $query_wh->result();

        $data['pro_tk'] = $row_tk;

        // tbong Kmom ==========

        $query_wh = query("SELECT

							(

								SELECT DISTINCT

									COUNT(`work`.id)

								FROM

									`work`

								INNER JOIN civilservant ON civilservant.id = `work`.id

								WHERE

									unit = '25'

							) AS c_id,

							count(gender) AS gender

						FROM

							civilservant

						INNER JOIN `work` ON `work`.id = civilservant.id

						WHERE

							gender = 'ស្រី'

						AND unit = '25' ");

        $row_tkm = $query_wh->result();

        $data['pro_tkm'] = $row_tkm;

        //  Phnom Penh Provincial Department==========

        $query_wh = query("SELECT

							(

								SELECT DISTINCT

									COUNT(`work`.id)

								FROM

									`work`

								INNER JOIN civilservant ON civilservant.id = `work`.id

								WHERE

									unit = '31'

							) AS c_id,

							count(gender) AS gender

						FROM

							civilservant

						INNER JOIN `work` ON `work`.id = civilservant.id

						WHERE

							gender = 'ស្រី'

						AND unit = '31' ");

        $row_pp_pd = $query_wh->result();

		$data['pro_pp_pd'] = $row_pp_pd;
		


        $id = $this->input->post('id_pdf');

        $data['id'] = $id;

        $this->load->view('header');

        $this->load->view('csv/csv_report/report_pdf', $data);

        $this->load->view('footer');

    }



    public function load()

    {

        // qr. ==============

        $qr = query("SELECT DISTINCT province FROM civilservant  ORDER BY id - 0 DESC ");



        $res = $qr->result();

        header('Content-Type: application/json; charset=utf-8');



        echo json_encode($res);

    }



    /* get_num_dip ========== */



    public function get_num_dip()

    {

        $qr = query("SELECT DISTINCTROW

                                dis.disp_num

                        FROM

                                display AS dis

                        ORDER BY

                                dis.disp_num - 0 ASC ");

        $res = $qr->result();

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode($res);

    }

	
    public function pdf_by_official()

    {

        $this->load->view('csv/csv_search/report_by_official');

    }





}





