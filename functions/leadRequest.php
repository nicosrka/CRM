<?php
/*1 Se traen los leads que pertenecen al usuario y se comprueba que hayan sido modificados por el vendedor, sino exit
2 Se traen todos los leads que no esten asignados y se los categoriza en 4 arrays.
3 Se llama a la funcion getScores() para determinar su categoria en el ranking
4 En base a la categoria, se hidrata el array leadsToAssign y se envia a la funcion assignLeads.php para su asignacion.
*/
require '../globals/database.php';
session_start();
$db = Database::getInstance();
$userId = $_SESSION['user']['id'];
$db->query("SELECT lead_counter FROM users WHERE id = '$userId'");
$user_counter = $db->fetch();
//TRAER TODOS LOS LEADS DEL USUARIO (ID)
$db->query("SELECT *     
            FROM assigned
            WHERE id_user = '$userId'");
$leads = $db->fetchAll();

$ok = 1;
//revisa si todos los leads asignados fueron cmabiados del estado origianl, osea si los trabajo.
foreach ($leads as $lead) {
    if ($lead['status'] == "default") $ok = 0;
}

if ($ok == 0) {
    echo "no reviso todos los datos.";
    exit;
} /* else {
    $db->query("SELECT *
                FROM leads
                LEFT JOIN assigned
                ON leads.id = assigned.id_lead  
                WHERE assigned.id_lead is Null");

    $leads = $db->fetchAll();
   
   
    $leadsNew = array();
    $leadsOld = array();
    $leadsInterested = array();
    $leadsNotInterested = array();

    foreach ($leads as $lead) {
        switch ($lead) {
            case $lead['label'] == 1:  //NEW LEADS
                $leadsNew[] = $lead;
                break;

            case $lead['label'] == 2:  //OLD LEADS
                $leadsOld[] = $lead;
                break;

            case $lead['label'] == 4:  //NOT INTERESTED
                $leadsNotInterested[] = $lead;
                break;

            case $lead['label'] == 5:  //INTERESTED
                $leadsInterested[] = $lead;
                break;
        }
    }
    $rank = getScores($userId);
    $leadsToAssign = array();

    switch ($rank) {
        case "top":                                     //3 nuevos 1 interested 1 old
            for ($i = 0; $i < 1; $i++) {                //for ($i = 0; $i < 3; $i++) {
                if (count($leadsNew) > 0) {
                    array_push($leadsToAssign, $leadsNew[0]);
                    array_splice($leadsNew,0,1);
                } else if (count($leadsInterested) > 0) {
                    array_push($leadsToAssign, $leadsInterested[0]);
                    array_splice($leadsInterested,0,1);
                } else if ((count($leadsOld) > 0)) {
                    array_push($leadsToAssign, $leadsOld[0]);
                    array_splice($leadsOld,0,1);
                } else if (count($leadsNotInterested) > 0) {
                    array_push($leadsToAssign, $leadsNotInterested[0]);
                    array_splice($leadsNotInterested,0,1);
                }  else echo "No hay datos disponibles en este momento!";
            }
                if (count($leadsInterested) > 0) {
                    array_push($leadsToAssign, $leadsInterested[0]);
                    array_splice($leadsInterested,0,1);
                } else if ((count($leadsOld) > 0)) {
                    array_push($leadsToAssign, $leadsOld[0]);
                    array_splice($leadsOld,0,1);
                } else if (count($leadsNotInterested) > 0) {
                    array_push($leadsToAssign, $leadsNotInterested[0]);
                    array_splice($leadsNotInterested,0,1);
                }  else echo "No hay datos disponibles en este momento!";
            
               if ((count($leadsOld) > 0)) {
                    array_push($leadsToAssign, $leadsOld[0]);
                    array_splice($leadsOld,0,1);
                } else if (count($leadsNotInterested) > 0) {
                    array_push($leadsToAssign, $leadsNotInterested[0]);
                    array_splice($leadsNotInterested,0,1);
                }  else echo "No hay datos disponibles en este momento!";
            break;

        case "mid":                                         //2 new 1 interested 1 not 1 old
            for ($i = 0; $i < 1; $i++) {   //for ($i = 0; $i < 2; $i++) {
                if (count($leadsNew) > 0) {
                    array_push($leadsToAssign, $leadsNew[0]);
                    array_splice($leadsNew,0,1);
                } else if (count($leadsInterested) > 0) {
                    array_push($leadsToAssign, $leadsInterested[0]);
                    array_splice($leadsInterested,0,1);
                } else if ((count($leadsOld) > 0)) {
                    array_push($leadsToAssign, $leadsOld[0]);
                    array_splice($leadsOld,0,1);
                } else if (count($leadsNotInterested) > 0) {
                    array_push($leadsToAssign, $leadsNotInterested[0]);
                    array_splice($leadsNotInterested,0,1);
                }  else echo "No hay datos disponibles en este momento!";
            }
                if (count($leadsInterested) > 0) {
                    array_push($leadsToAssign, $leadsInterested[0]);
                    array_splice($leadsInterested,0,1);
                } else if ((count($leadsOld) > 0)) {
                    array_push($leadsToAssign, $leadsOld[0]);
                    array_splice($leadsOld,0,1);
                } else if (count($leadsNotInterested) > 0) {
                    array_push($leadsToAssign, $leadsNotInterested[0]);
                    array_splice($leadsNotInterested,0,1);
                }  else echo "No hay datos disponibles en este momento!";
            
               if ((count($leadsOld) > 0)) {
                    array_push($leadsToAssign, $leadsOld[0]);
                    array_splice($leadsOld,0,1);
                } else if (count($leadsNotInterested) > 0) {
                    array_push($leadsToAssign, $leadsNotInterested[0]);
                    array_splice($leadsNotInterested,0,1);
                }  else echo "No hay datos disponibles en este momento!";

                if (count($leadsNotInterested) > 0) {
                    array_push($leadsToAssign, $leadsNotInterested[0]);
                    array_splice($leadsNotInterested,0,1);
                }  else echo "No hay datos disponibles en este momento!";
            break;

        case "low":                                         //2 interested 1 new 1 notint 1 old
                if (count($leadsNew) > 0) {
                    array_push($leadsToAssign, $leadsNew[0]);
                    array_splice($leadsNew,0,1);
                } else if (count($leadsInterested) > 0) {
                    array_push($leadsToAssign, $leadsInterested[0]);
                    array_splice($leadsInterested,0,1);
                } else if ((count($leadsOld) > 0)) {
                    array_push($leadsToAssign, $leadsOld[0]);
                    array_splice($leadsOld,0,1);
                } else if (count($leadsNotInterested) > 0) {
                    array_push($leadsToAssign, $leadsNotInterested[0]);
                    array_splice($leadsNotInterested,0,1);
                }  else echo "No hay datos disponibles en este momento!";
            
                for ($i = 0 ; $i < 1 ; $i++) {          //for ($i = 0 ; $i < 2 ; $i++) {
                    if (count($leadsInterested) > 0) {
                        array_push($leadsToAssign, $leadsInterested[0]);
                        array_splice($leadsInterested,0,1);
                    } else if ((count($leadsOld) > 0)) {
                        array_push($leadsToAssign, $leadsOld[0]);
                        array_splice($leadsOld,0,1);
                    } else if (count($leadsNotInterested) > 0) {
                        array_push($leadsToAssign, $leadsNotInterested[0]);
                        array_splice($leadsNotInterested,0,1);
                    }  else echo "No hay datos disponibles en este momento!";
                }

               if ((count($leadsOld) > 0)) {
                    array_push($leadsToAssign, $leadsOld[0]);
                    array_splice($leadsOld,0,1);
                } else if (count($leadsNotInterested) > 0) {
                    array_push($leadsToAssign, $leadsNotInterested[0]);
                    array_splice($leadsNotInterested,0,1);
                }  else echo "No hay datos disponibles en este momento!";

                if (count($leadsNotInterested) > 0) {
                    array_push($leadsToAssign, $leadsNotInterested[0]);
                    array_splice($leadsNotInterested,0,1);
                }  else echo "No hay datos disponibles en este momento!";
            break;
    }
}                                   //ESTE ES EL CODIGO QUE SE ENCARGA DE BUSCAR EL RANK Y ASIGNAR LEADS SEGUN FILTRO, NO EN USO
*/ else {
    $db->query("SELECT *
                FROM leads
                LEFT JOIN assigned
                ON leads.id = assigned.id_lead  
                WHERE assigned.id_lead is Null AND leads.group_sale = '0' AND leads.label IN (1,2,5,6,7,8)");

    $leads_ok = $db->fetchAll();
    assignLeads($leads_ok[0]['id'], $userId, $user_counter['lead_counter']);
}

function getScores($id)
{
    $db = Database::getInstance();
    $db->query("SELECT id, score FROM users ORDER BY `users`.`score` DESC");
    $users = $db->fetchAll();
    foreach ($users as $key => $user) {
        if ($user['id'] == $id) {
            if (($key + 1) <= 3) {
                return "top";
            } else if (($key + 1) > 3 && ($key + 1) <= 6) {
                return "mid";
            } else return "low";
        }
    }
}

function assignLeads($lead, $userId, $user_counter)
{
    $db = Database::getInstance();
    $user_counter++;
    if ($lead == 0) exit;
    // ESTE BLOQUE DEBE ESTAR HABILITADO EN CASO DE USARSE EL SISTEMA DE RANK.
    // $queryString = "INSERT INTO `assigned`(`id_user`, `id_lead`, `status`) VALUES ";
    // foreach ($leads as $lead) {
    //     $queryString = $queryString . "( " . $userId . ", " . $lead['id'] .  ", default),";
    // }
    // $queryString = substr($queryString, 0, -1);
    // $db->query($queryString);

    $db->query("INSERT INTO `assigned`(`id_user`, `id_lead`, `status`) VALUES ('$userId', '$lead', 'default') LIMIT 1");
    $db->query("UPDATE `users` SET `lead_counter`= '$user_counter' WHERE `id` = '$userId' LIMIT 1");
}
