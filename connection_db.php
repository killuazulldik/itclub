<?php
                                $servername ="localhost";
                                $username = "root";
                                $password = "";
                                $database = "club88";

                                //mao ni pag connection sa database
                                $connection = mysqli_connect($servername, $username, $password, $database);
                            
                                    if(!$connection){
                                        die("Connection failed:" . mysqli_connect_error());
                                    }else{
                                        "wla na connect";
                                    }
                                ?>