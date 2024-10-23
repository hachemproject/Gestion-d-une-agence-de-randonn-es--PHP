<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from sb-admin-pro.startbootstrap.com/auth-register-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 Mar 2024 13:44:15 GMT -->
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register - SB Admin Pro</title>
        <link href="styles.css" rel="stylesheet" />
       
        <script data-search-pseudo-elements="" defer="" src="../cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js" crossorigin="anonymous"></script>
        <script src="../cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <br>
        <br>
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container-xl px-4">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div ><h1 class="titel"> Create Account</h1></div>
                                    <div class="card-body">
                                    <form action="../../Controller/ControlRegist.php" method="POST" enctype="multipart/form-data">
                                            <div class="row gx-3">
                                            <?php 
                                            if(isset($_GET['errorCIN'])) {?>
                                        <p style="background: #F2DEDE;color: #A94442;padding: 10px;width: 95%;border-radius: 5px;margin: 20px auto;text-align: center;">
                                        <?php echo $_GET['errorCIN']; ?></p>
     	                                        <?php } ?>
                                                 <?php 
                                            if(isset($_GET['errorEMAIL'])) {?>
                                        <p style="background: #F2DEDE;color: #A94442;padding: 10px;width: 95%;border-radius: 5px;margin: 20px auto;text-align: center;">
                                       <?php echo $_GET['errorEMAIL']; ?></p>
     	                                        <?php } ?>
                                                <?php 
                                            if(isset($_GET['errorpasse'])) {?>
                                        <p style="background: #F2DEDE;color: #A94442;padding: 10px;width: 95%;border-radius: 5px;margin: 20px auto;text-align: center;">
                                      <?php echo $_GET['errorpasse']; ?></p>
     	                                        <?php } ?>

                                                 <?php 
                                            if(isset($_GET['Valid'])) {?>
                                        <p style=" background: #D4EDDA;color: #40754C;padding: 10px;width: 95%;border-radius: 5px;margin: 20px auto;text-align: center;">
                                      <?php echo $_GET['Valid']; ?></p>
     	                                        <?php } ?> 
                                            
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label  class="small mb-1" >Cin</label>
                                                
                                                            <input name="ciin"
                                                             class="form-control" 
                                                             type="number" 
                                                             placeholder="Enter Cin" 
                                                          required />
                                       

                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="small mb-1" > Name</label>
                                                        <input  name="name"
                                                         class="form-control" 
                                                         type="text"
                                                          placeholder="Ente name" 
                                                          required/>
                                                          
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row gx-3">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="small mb-1" >Last Name</label>
                                                        <input name="prenom" class="form-control" type="text" placeholder="Enter Last Name"  required/>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="small mb-1" > Date De naissance</label>
                                                        <input name="date" class="form-control" type="date" placeholder=" Enter Date De naissance"  required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="small mb-1" >Email</label>

                                               
    <input name="email" class="form-control" type="email" aria-describedby="emailHelp" placeholder="Enter email address" required />



                                            </div>
                                            
                                            <div class="row gx-3">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label  class="small mb-1">Password</label>
                                                        <input name="pasword" class="form-control"  type="password" placeholder="Enter password" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="small mb-1" >Confirm Password</label>
                                                        <input name="confPassword" class="form-control" type="password" placeholder="Confirm password" required/>
                                                    </div>
                                                </div>
                                                <input type="file" name="img" required>

                                            </div>
                                            <input name="submit" type="submit" value="Register">
                                            <div class="sign">
                                                  Not a member? <a href="login.php">Login</a>
                                            </div >
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            
        </div>
        <script src="../cdn.jsdelivr.net/npm/bootstrap%405.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>

        <script src="../assets.startbootstrap.com/js/sb-customizer.js"></script>
        <sb-customizer project="sb-admin-pro"></sb-customizer>
    <script>(function(){var js = "window['__CF$cv$params']={r:'863c7463996d70e6',t:'MTcxMDMzNzQyNC4wNjMwMDA='};_cpo=document.createElement('script');_cpo.nonce='',_cpo.src='cdn-cgi/challenge-platform/h/g/scripts/jsd/5b600c458061/main.js',document.getElementsByTagName('head')[0].appendChild(_cpo);";var _0xh = document.createElement('iframe');_0xh.height = 1;_0xh.width = 1;_0xh.style.position = 'absolute';_0xh.style.top = 0;_0xh.style.left = 0;_0xh.style.border = 'none';_0xh.style.visibility = 'hidden';document.body.appendChild(_0xh);function handler() {var _0xi = _0xh.contentDocument || _0xh.contentWindow.document;if (_0xi) {var _0xj = _0xi.createElement('script');_0xj.innerHTML = js;_0xi.getElementsByTagName('head')[0].appendChild(_0xj);}}if (document.readyState !== 'loading') {handler();} else if (window.addEventListener) {document.addEventListener('DOMContentLoaded', handler);} else {var prev = document.onreadystatechange || function () {};document.onreadystatechange = function (e) {prev(e);if (document.readyState !== 'loading') {document.onreadystatechange = prev;handler();}};}})();</script><script defer src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317" integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA==" data-cf-beacon='{"rayId":"863c7463996d70e6","b":1,"version":"2024.2.4","token":"6e2c2575ac8f44ed824cef7899ba8463"}' crossorigin="anonymous"></script>
</body>

<!-- Mirrored from sb-admin-pro.startbootstrap.com/auth-register-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 Mar 2024 13:44:15 GMT -->
</html>
