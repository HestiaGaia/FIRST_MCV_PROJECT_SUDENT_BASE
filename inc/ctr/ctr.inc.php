<?php
    require_once './inc/view/view.class.php';
    require_once './inc/model/model.class.php';
    
    function perform(){
        $view=new View;
        if(isset($_SESSION['login'])){
            //FLAG  
            //echo "SESSION IS SET";
            switch (@$_GET['action']){  /*lower case key word means 
                                        a fonctionality not a page to show*/
                case 'back':    
                    //BACK TO THE HOME PAGE
                    header("Location: ./");
                    break;
                case 'logout':  
                    //LOGOUT
                    session_unset();
                    header("Location: ./");
                    break;
                case 'obliterate':
                    echo 'obliterate';
                    $model=new Model;
                    $model->obliterate(array($_GET['who']));
                    header("Location: ./");
                    break;
                case 'modify':
                    $model=new Model;
                    //INFO GATHARING SECTION
                    $cne=$_POST['CNE'];
                    $arr=array(
                        'nom'       => $_POST['NOM'],
                        'prenom'    => $_POST['PRENOM'],
                        'adresse'   => $_POST['ADDR'],
                        'ville'     => $_POST['VILLE'],
                        'email'     => $_POST['EMAIL']
                    );
                    //....................//
                    
                    foreach ($arr as $key => $value)
                        if (!empty($value)) 
                            $model->modify(array(
                                $key,
                                $value,
                                $cne
                            ));
                    
                    header("Location: ./");
                    break;
                case 'add':
                    $model=new Model;
                    //INFO GATHARING SECTION
                    $cne=$_POST['CNE'];
                    $nom=$_POST['NOM'];
                    $prenom=$_POST['PRENOM'];
                    $addr=$_POST['ADDR'];
                    $ville=$_POST['VILLE'];
                    $email=$_POST['EMAIL'];
                    $img="/photos/$nom.png";
                    $etat=0;
                    //.....................//
                   
                    move_uploaded_file($_FILES['IMG']['tmp_name"'],$img);
                    $model->addStudent(array($cne,$nom,$prenom,$addr,$ville,$email,$img,$etat));
                    header("Location: ./?action=ADD_PAGE");
                    break;
                    
                case 'ADD_PAGE':
                    $view->show('add.cont');
                    break;
                case 'MODIFY_PAGE':
                    $model= new Model;
                    $view->show('modify.cont',array(
                        $_GET['who'],
                        $model->getStudent(array($_GET['who']))->fetch()
                    ));
                    break;

                //DISPLAY THE HOME PAGE
                default:
                    $model=new Model;
                    $view->show("students.cont",$model->getTable());
                    break;
            }
        }else switch (@$_GET['action']){
            case 'login':
                $model=new Model;
                //INFO GATHARING SECTION
                $usr=$_POST['usr'];
                $passwd=$_POST['passwd'];
                //....................//
                
                if($passwd==$model->query(
                    "select passwd from comptes where user=?",
                    array($usr))->fetch()['passwd']){
                    
                    $_SESSION['login']=$usr;
                    echo $_SESSION['login'];
                    
                }else echo 'Failure';
                header("Location: ./");
                break;
                                      
            //DISPLAY THE LOGIN PAGE
            default:
                $view->show("login.cont"); 
            break;
        }
    }
?>