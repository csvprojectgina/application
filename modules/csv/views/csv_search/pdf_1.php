<?phpinclude_once(APPPATH . "libraries/mpdf60/mpdf.php");$mpdf = new mPDF();$title='បញ្ជីមន្ត្រីរាជការតាម';// ==========$mpdf->simpleTables = true;$mpdf->useSubstitutions = false;$mpdf->incrementFPR1 = 1;ini_set('memory_limit', '100024M');set_time_limit(80000);$unit1 = $this->input->get('unit');$unit = 2;$where = '';if ($current_role != '') {    $where .= "AND ( w.current_role_id = '{$current_role}' ) ";    $title .= ' មុខតំណែង ';}if ($unit != '') {    $where .= "AND ( w.unit = $unit1) ";    $where2 = "AND ( id= $unit1 ) ";    $title .= ' អង្គភាព';}if ($general_department != '') {    $where .= "AND (  w.general_department = '{$general_department}' ) ";    $title .= ' អគ្គនាយកដ្ឋាន';}if ($department != '') {    $where .= "AND (  w.department = '{$department}' ) ";    $title .= ' នាយកដ្ឋាន';}if ($land_official != '') {    $where .= "AND (  w.land_official = '{$land_official}' ) ";    $title .= ' ការិយាល័យភូមិបាល';}if ($work_office != '') {    $where .= "AND ( w.work_office = '{$work_office}' ) ";     $title .= ' ការិយាល័យ';}$header = '<table width="100%" style="border-bottom: 1px solid #000000; vertical-align: bottom; font-family: khmermef2; font-size: 9pt; color: #10517F;"><tr>                <td width="33%">ក្រសួងរៀបចំដែនដី នគរូបនីយកម្ម និងសំណង់<span style="font-size:10pt;"></td>                <td></td>                <td width="33%" style="text-align: right;"><span style="font-weight: bold;"></span></td>                </tr></table>';$footer = '<table width="100%" style="border-bottom: 1px solid #000000; vertical-align: bottom; font-family: khmermef2; font-size: 9pt; color: #10517F;"><tr>            <td width="30%"><span style="font-size:10pt;"></td>            </tr></table>            <table  width="100%" style="border-bottom: 0px solid #000000; vertical-align: bottom; font-family: khmermef2; font-size: 9pt; color: #10517F;"><tr>            <td width="33%" style="text-align: right;"><span style="font-weight: bold;">{PAGENO}/{nb}</span></td>            </tr></table>';$html='';$html .= '<p style="font-family: khmermef2;text-align: center;font-size: 18px">' . $title . '</p>';$html .= '<table border="0" cellpadding="3" cellspacing="0" style="border-collapse: collapse;font-family: khmermef1; width: 100%; text-align: center;">           <thead>            <tr>                <td style="border: 1px solid blue; font-family: khmermef2; width: 5%; height: 45px;">ល.រ</td>                <td style="border: 1px solid blue; font-family: khmermef2; width: 12%; height: 20px;">អត្តលេខមន្ត្រី</td>                <td style="border: 1px solid blue; font-family: khmermef2; width: 13%; height: 20px;">គោត្តនាម</td>                <td style="border: 1px solid blue; font-family: khmermef2; width: 15%; height: 20px;">នាម</td>                <td style="border: 1px solid blue; font-family: khmermef2; width: 5%; height: 20px;">ភេទ</td>                <td style="border: 1px solid blue; font-family: khmermef2; width: 15%; height: 20px;">ថ្ងៃ​ខែឆ្នាំ កំណើត</td>                <td style="border: 1px solid blue; font-family: khmermef2; width: 15%; height: 20px;">ទូរស័ព្ទ</td>                <td style="border: 1px solid blue; font-family: khmermef2; width: 15%; height: 20px;">តួនាទី</td>            </tr>        </thead>            <tbody>';$sql = '';$sql.="SELECT          cs.id,          cs.civil_servant_id,          cs.firstname,          cs.lastname,          cs.gender,          cs.dateofbirth,          cs.mobile_phone,          w.unit,          w.province_office,          w.land_official,        w.current_role_id,          w.general_department,          w.department,          w.work_office,          cr.current_role_in_khmer,        cs.common_official_code        FROM        civilservant AS cs        LEFT JOIN `work` AS w ON cs.id = w.id        LEFT JOIN `currentrole` AS cr ON cr.id = w.current_role_id        WHERE 1 = 1	  {$where}";//    $sql.="ORDER BY////            CASE////    WHEN cs.unit_official_code IN ('', '0') THEN////            1////    ELSE////            0////    END,//// cs.common_official_code DESC,////        CASE////    WHEN w.current_role_id IN ('', '0') THEN////            1////    ELSE////            0////    END,////     w.current_role_id DESC////                ";//$qr = query($sql);$query_unit = $this->db->query('select * from unit where 1=1 '. $where2);$query_g_dept = $this->db->query('select * from general_departments');$tr = '';$i = 1;//$tr .= '<tr>////                             <td colspan="8" style="background-color:#eee;text-align: left;padding: 10px 0 0 10px;  height: 40px;">' . $unit1 . '</td>////                          </tr>';   foreach ($query_unit->result() as $row1) {   if    ($row1->id!=1) {    // Provincial dept           $qr  = $this->db->query("select * from  ( $sql ) as sw  Where  sw.unit ={$row1->id}  AND sw.province_office =' ' AND sw.land_official =''   order by sw.current_role_id,common_official_code ");          if ($qr->num_rows() > 0) {     $tr .= '<tr>                             <td colspan="8" style="background-color:#eee;text-align: left;padding: 10px 0 0 10px;  height: 40px;">' . $row1->unit . '</td>                          </tr>';               foreach ($qr->result() as $row) {        $tr .= "<tr>" .                "<td style='border: 1px solid blue; height: 30px;'>" . $i . "</td>" .                "<td style='border: 1px solid blue;font-size: 15px;'>" . $row->civil_servant_id . "</td>" .                "<td style='border: 1px solid blue;font-size: 15px;'>" . $row->lastname . "</td>" .                "<td style='border: 1px solid blue;font-size: 15px;'>" . $row->firstname . "</td>" .                "<td style='border: 1px solid blue;'>" . $row->gender  . "</td>" .                "<td style='border: 1px solid blue;'>" . $row->dateofbirth. "</td>" .                "<td style='border: 1px solid blue;font-size: 10px;'>" . $row->mobile_phone. "</td>" .                "<td style='border: 1px solid blue;'>" . $row->current_role_in_khmer. "</td>" .              //  "<td style='border: 1px solid blue;'>" . $row->unit_name . "</td>" .                "</tr>";        $i++;    }    $to = $i;}                         //provincial office       $query_office = $this->db->query("select * from province_office where u_id = $row1->id  ");         foreach ($query_office->result() as $office ){                  $qr  = $this->db->query("select * from  ( $sql ) as sw  Where  sw.unit ={$row1->id}  AND sw.province_office =$office->id AND sw.land_official =''  order by  sw.current_role_id,common_official_code ");    if ($qr->num_rows() > 0) {        $tr .= '<tr>                             <td colspan="8" style="background-color:#eee;text-align: left;padding: 10px 0 0 10px;  height: 40px;">' . $office->office. '</td>                          </tr>';               foreach ($qr->result() as $row) {        $tr .= "<tr>" .                   "<td style='border: 1px solid blue; height: 30px;font-size: 13px;'>" . $i . "</td>" .                "<td style='border: 1px solid blue;font-size: 13px;'>" . ($row->civil_servant_id != '' ? $row->civil_servant_id : '') . "</td>" .                "<td style='border: 1px solid blue;font-size: 13px;'>" . ($row->lastname != '' ? $row->lastname : '') . "</td>" .                "<td style='border: 1px solid blue;font-size: 13px;'>" . ($row->firstname != '' ? $row->firstname : '') . "</td>" .                "<td style='border: 1px solid blue;font-size: 13px;'>" . ($row->gender != '' ? $row->gender : '') . "</td>" .                "<td style='border: 1px solid blue;font-size: 13px;'>" . ($row->dateofbirth != '' ? $row->dateofbirth : '') . "</td>" .                "<td style='border: 1px solid blue;font-size: 10px;'>" . ($row->mobile_phone != '' ? $row->mobile_phone : '') . "</td>" .                "<td style='border: 1px solid blue;font-size: 13px;'>" . ($row->current_role_in_khmer != '' ? $row->current_role_in_khmer : '') . "</td>" .              //  "<td style='border: 1px solid blue;'>" . ($row->unit_name != '' ? $row->unit_name : '') . "</td>" .                "</tr>";        $i++;    }    $to = $i;}   }// district office             $query_office = $this->db->query("select * from land_officials where unit = $row1->id  ");         foreach ($query_office->result() as $office ){                  $qr  = $this->db->query("select * from  ( $sql ) as sw  Where  sw.unit ={$row1->id}  AND sw.province_office ='' AND sw.land_official ='$office->id'   order by sw.current_role_id,common_official_code ");    if ($qr->num_rows() > 0) {        $tr .= '<tr>                             <td colspan="8" style="background-color:#eee;text-align: left;padding: 10px 0 0 10px;  height: 40px;">' . $office->land_official. '</td>                          </tr>';               foreach ($qr->result() as $row) {        $tr .= "<tr>" .                   "<td style='border: 1px solid blue; height: 30px;font-size: 13px;'>" . $i . "</td>" .                "<td style='border: 1px solid blue;font-size: 13px;'>" . ($row->civil_servant_id != '' ? $row->civil_servant_id : '') . "</td>" .                "<td style='border: 1px solid blue;font-size: 13px;'>" . ($row->lastname != '' ? $row->lastname : '') . "</td>" .                "<td style='border: 1px solid blue;font-size: 13px;'>" . ($row->firstname != '' ? $row->firstname : '') . "</td>" .                "<td style='border: 1px solid blue;font-size: 13px;'>" . ($row->gender != '' ? $row->gender : '') . "</td>" .                "<td style='border: 1px solid blue;font-size: 13px;'>" . ($row->dateofbirth != '' ? $row->dateofbirth : '') . "</td>" .                "<td style='border: 1px solid blue;font-size: 10px;'>" . ($row->mobile_phone != '' ? $row->mobile_phone : '') . "</td>" .                "<td style='border: 1px solid blue;font-size: 13px;'>" . ($row->current_role_in_khmer != '' ? $row->current_role_in_khmer : '') . "</td>" .              //  "<td style='border: 1px solid blue;'>" . ($row->unit_name != '' ? $row->unit_name : '') . "</td>" .                "</tr>";        $i++;    }    $to = $i;}   }       }      else{         $tr .= '<tr>                             <td colspan="8" style="background-color:#eee;text-align: left;padding: 10px 0 0 10px;  height: 40px;">' . $row1->unit . '</td>                          </tr>';         //leader ministry         $qr  = $this->db->query("select * from  ( $sql ) as sw  Where  sw.unit ={$row1->id}  AND sw.general_department =' ' AND sw.department =''  AND sw.work_office = '' order by sw.current_role_id,common_official_code ");          if ($qr->num_rows() > 0) {            foreach ($qr->result() as $row) {        $tr .= "<tr>" .                "<td style='border: 1px solid blue; height: 30px;'>" . $i . "</td>" .                "<td style='border: 1px solid blue;font-size: 15px;'>" . $row->civil_servant_id . "</td>" .                "<td style='border: 1px solid blue;font-size: 15px;'>" . $row->lastname . "</td>" .                "<td style='border: 1px solid blue;font-size: 15px;'>" . $row->firstname . "</td>" .                "<td style='border: 1px solid blue;'>" . $row->gender  . "</td>" .                "<td style='border: 1px solid blue;'>" . $row->dateofbirth. "</td>" .                "<td style='border: 1px solid blue;font-size: 10px;'>" . $row->mobile_phone. "</td>" .                "<td style='border: 1px solid blue;'>" . $row->current_role_in_khmer. "</td>" .              //  "<td style='border: 1px solid blue;'>" . $row->unit_name . "</td>" .                "</tr>";        $i++;    }    $to = $i;}//  dept  without general dept  $query_dept = $this->db->query("select * from tbl_departments where general_deps_id= '' ");   foreach ($query_dept->result() as $dpt ){      $qr  = $this->db->query("select * from  ( $sql ) as sw   where  sw.unit ={$row1->id}  AND sw.general_department = ''  AND sw.department =$dpt->d_id   AND sw.work_office ='' order by sw.current_role_id,common_official_code ");                            if ($qr->num_rows() > 0) {             $tr .= '<tr>                             <td colspan="8" style="background-color:#eee;text-align: left;padding: 10px 0 0 10px;  height: 40px;">' . $dpt->d_name .  '</td>                          </tr>';               foreach ($qr->result() as $row) {        $tr .= "<tr>" .                "<td style='border: 1px solid blue; height: 30px;font-size: 13px;'>" . $i . "</td>" .                "<td style='border: 1px solid blue;font-size: 13px;'>" . ($row->civil_servant_id != '' ? $row->civil_servant_id : '') . "</td>" .                "<td style='border: 1px solid blue;font-size: 13px;'>" . ($row->lastname != '' ? $row->lastname : '') . "</td>" .                "<td style='border: 1px solid blue;font-size: 13px;'>" . ($row->firstname != '' ? $row->firstname : '') . "</td>" .                "<td style='border: 1px solid blue;font-size: 13px;'>" . ($row->gender != '' ? $row->gender : '') . "</td>" .                "<td style='border: 1px solid blue;font-size: 13px;'>" . ($row->dateofbirth != '' ? $row->dateofbirth : '') . "</td>" .                "<td style='border: 1px solid blue;font-size: 10px;'>" . ($row->mobile_phone != '' ? $row->mobile_phone : '') . "</td>" .                "<td style='border: 1px solid blue;font-size: 13px;'>" . ($row->current_role_in_khmer != '' ? $row->current_role_in_khmer : '') . "</td>" .              //  "<td style='border: 1px solid blue;'>" . ($row->unit_name != '' ? $row->unit_name : '') . "</td>" .                "</tr>";        $i++;    }    $to = $i;}            $query_office = $this->db->query("select * from offices where departments_id = $dpt->d_id  ");         foreach ($query_office->result() as $office ){                   $qr  = $this->db->query("select * from  ( $sql ) as sw  where  sw.unit ={$row1->id}  AND sw.general_department = '' AND sw.department =$dpt->d_id  AND sw.work_office = $office->id order by sw.current_role_id,common_official_code"); if ($qr->num_rows() > 0) {        $tr .= '<tr>                             <td colspan="8" style="background-color:#eee;text-align: left;padding: 10px 0 0 10px;  height: 40px;">' . $office->office. '</td>                          </tr>';               foreach ($qr->result() as $row) {        $tr .= "<tr>" .                   "<td style='border: 1px solid blue; height: 30px;font-size: 13px;'>" . $i . "</td>" .                "<td style='border: 1px solid blue;font-size: 13px;'>" . ($row->civil_servant_id != '' ? $row->civil_servant_id : '') . "</td>" .                "<td style='border: 1px solid blue;font-size: 13px;'>" . ($row->lastname != '' ? $row->lastname : '') . "</td>" .                "<td style='border: 1px solid blue;font-size: 13px;'>" . ($row->firstname != '' ? $row->firstname : '') . "</td>" .                "<td style='border: 1px solid blue;font-size: 13px;'>" . ($row->gender != '' ? $row->gender : '') . "</td>" .                "<td style='border: 1px solid blue;font-size: 13px;'>" . ($row->dateofbirth != '' ? $row->dateofbirth : '') . "</td>" .                "<td style='border: 1px solid blue;font-size: 10px;'>" . ($row->mobile_phone != '' ? $row->mobile_phone : '') . "</td>" .                "<td style='border: 1px solid blue;font-size: 13px;'>" . ($row->current_role_in_khmer != '' ? $row->current_role_in_khmer : '') . "</td>" .              //  "<td style='border: 1px solid blue;'>" . ($row->unit_name != '' ? $row->unit_name : '') . "</td>" .                "</tr>";        $i++;    }    $to = $i;}   }       }        foreach ($query_g_dept->result() as $g_dpt ){           $qr  = $this->db->query("select * from  ( $sql ) as sw   where  sw.unit ={$row1->id}  AND sw.general_department = $g_dpt->general_dep_id  AND sw.department ='' order by sw.current_role_id,common_official_code ");                            if ($qr->num_rows() > 0) {             $tr .= '<tr>                             <td colspan="8" style="background-color:#eee;text-align: left;padding: 10px 0 0 10px;  height: 40px;">' . $g_dpt->general_deps_name . '</td>                          </tr>';               foreach ($qr->result() as $row) {        $tr .= "<tr>" .                "<td style='border: 1px solid blue; height: 30px;font-size: 13px;'>" . $i . "</td>" .                "<td style='border: 1px solid blue;font-size: 13px;'>" . ($row->civil_servant_id != '' ? $row->civil_servant_id : '') . "</td>" .                "<td style='border: 1px solid blue;font-size: 13px;'>" . ($row->lastname != '' ? $row->lastname : '') . "</td>" .                "<td style='border: 1px solid blue;font-size: 13px;'>" . ($row->firstname != '' ? $row->firstname : '') . "</td>" .                "<td style='border: 1px solid blue;font-size: 13px;'>" . ($row->gender != '' ? $row->gender : '') . "</td>" .                "<td style='border: 1px solid blue;font-size: 13px;'>" . ($row->dateofbirth != '' ? $row->dateofbirth : '') . "</td>" .                "<td style='border: 1px solid blue;font-size: 10px;'>" . ($row->mobile_phone != '' ? $row->mobile_phone : '') . "</td>" .                "<td style='border: 1px solid blue;font-size: 13px;'>" . ($row->current_role_in_khmer != '' ? $row->current_role_in_khmer : '') . "</td>" .             //   "<td style='border: 1px solid blue;'>" . ($row->unit_name != '' ? $row->unit_name : '') . "</td>" .                "</tr>";        $i++;    }    $to = $i;}   $query_dept = $this->db->query("select * from tbl_departments where general_deps_id=  $g_dpt->general_dep_id ");   foreach ($query_dept->result() as $dpt ){      $qr  = $this->db->query("select * from  ( $sql ) as sw   where  sw.unit ={$row1->id}  AND sw.general_department = $g_dpt->general_dep_id  AND sw.department =$dpt->d_id   AND sw.work_office ='' order by sw.current_role_id,common_official_code ");                            if ($qr->num_rows() > 0) {             $tr .= '<tr>                             <td colspan="8" style="background-color:#eee;text-align: left;padding: 10px 0 0 10px;  height: 40px;">' . $dpt->d_name .  '</td>                          </tr>';               foreach ($qr->result() as $row) {        $tr .= "<tr>" .                "<td style='border: 1px solid blue; height: 30px;font-size: 13px;'>" . $i . "</td>" .                "<td style='border: 1px solid blue;font-size: 13px;'>" . ($row->civil_servant_id != '' ? $row->civil_servant_id : '') . "</td>" .                "<td style='border: 1px solid blue;font-size: 13px;'>" . ($row->lastname != '' ? $row->lastname : '') . "</td>" .                "<td style='border: 1px solid blue;font-size: 13px;'>" . ($row->firstname != '' ? $row->firstname : '') . "</td>" .                "<td style='border: 1px solid blue;font-size: 13px;'>" . ($row->gender != '' ? $row->gender : '') . "</td>" .                "<td style='border: 1px solid blue;font-size: 13px;'>" . ($row->dateofbirth != '' ? $row->dateofbirth : '') . "</td>" .                "<td style='border: 1px solid blue;font-size: 10px;'>" . ($row->mobile_phone != '' ? $row->mobile_phone : '') . "</td>" .                "<td style='border: 1px solid blue;font-size: 13px;'>" . ($row->current_role_in_khmer != '' ? $row->current_role_in_khmer : '') . "</td>" .              //  "<td style='border: 1px solid blue;'>" . ($row->unit_name != '' ? $row->unit_name : '') . "</td>" .                "</tr>";        $i++;    }    $to = $i;}            $query_office = $this->db->query("select * from offices where departments_id = $dpt->d_id  ");         foreach ($query_office->result() as $office ){                   $qr  = $this->db->query("select * from  ( $sql ) as sw  where  sw.unit ={$row1->id}  AND sw.general_department = $g_dpt->general_dep_id AND sw.department =$dpt->d_id  AND sw.work_office = $office->id order by sw.current_role_id,common_official_code"); if ($qr->num_rows() > 0) {        $tr .= '<tr>                             <td colspan="8" style="background-color:#eee;text-align: left;padding: 10px 0 0 10px;  height: 40px;">' . $office->office. '</td>                          </tr>';               foreach ($qr->result() as $row) {        $tr .= "<tr>" .                   "<td style='border: 1px solid blue; height: 30px;font-size: 13px;'>" . $i . "</td>" .                "<td style='border: 1px solid blue;font-size: 13px;'>" . ($row->civil_servant_id != '' ? $row->civil_servant_id : '') . "</td>" .                "<td style='border: 1px solid blue;font-size: 13px;'>" . ($row->lastname != '' ? $row->lastname : '') . "</td>" .                "<td style='border: 1px solid blue;font-size: 13px;'>" . ($row->firstname != '' ? $row->firstname : '') . "</td>" .                "<td style='border: 1px solid blue;font-size: 13px;'>" . ($row->gender != '' ? $row->gender : '') . "</td>" .                "<td style='border: 1px solid blue;font-size: 13px;'>" . ($row->dateofbirth != '' ? $row->dateofbirth : '') . "</td>" .                "<td style='border: 1px solid blue;font-size: 10px;'>" . ($row->mobile_phone != '' ? $row->mobile_phone : '') . "</td>" .                "<td style='border: 1px solid blue;font-size: 13px;'>" . ($row->current_role_in_khmer != '' ? $row->current_role_in_khmer : '') . "</td>" .              //  "<td style='border: 1px solid blue;'>" . ($row->unit_name != '' ? $row->unit_name : '') . "</td>" .                "</tr>";        $i++;    }    $to = $i;}              }      } }}    }$html .= $tr;$html .= '</tbody>            <tfoot>                <tr>                    <td colspan="8" style="text-align: left;padding: 10px 0 0 0;  height: 45px;">សរុបមន្ត្រី <b>' .($to - 1). 'នាក់</b></td>                </tr>            </tfoot>        </table>';$mpdf->SetHTMLHeader($header);$mpdf->SetHTMLFooter($footer);$mpdf->AddPage('P', 'A4', '', '', '', '5', '5', '', '', '3');$mpdf->WriteHTML($html);$mpdf->Output();exit();