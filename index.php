
<?php
require_once("PaytmKit/lib/config_paytm.php");
require_once("PaytmKit/lib/encdec_paytm.php");

    // define("merchantMid", "dZlzzF17647713571019");
    // Key in your staging and production MID available in your dashboard
    // define("merchantKey", "O0zUdI1&G%OQViK_");
    // Key in your staging and production merchant key available in your dashboard
    // define("orderId", "order1");
    // define("channelId", "WEB");
    // define("website", "WEBSTAGING");
    // define("industryTypeId", "Retail");
    // define("callbackUrl", "http://127.0.0.1/devchandan/payment-using-paytm/response.php");
    // define("txnAmount", "100.12");
    // This is the staging value. Production value is available in your dashboard
    // This is the staging value. Production value is available in your dashboard
    // define("callbackUrl", "https://<Merchant_Response_URL>");

    $orderId 	= time();
    $txnAmount 	= "100";
    $custId 	= "cust123";
    $mobileNo 	= "7777777777";
    $email 		= "username@emailprovider.com";

    $paytmParams = array();
    $paytmParams["ORDER_ID"] 	= $orderId;
    $paytmParams["CUST_ID"] 	= $custId;
    $paytmParams["MOBILE_NO"] 	= $mobileNo;
    $paytmParams["EMAIL"] 		= $email;
    $paytmParams["TXN_AMOUNT"] 	= $txnAmount;
    $paytmParams["MID"] 		= PAYTM_MERCHANT_MID;
    $paytmParams["CHANNEL_ID"] 	= PAYTM_CHANNEL_ID;
    $paytmParams["WEBSITE"] 	= PAYTM_MERCHANT_WEBSITE;
    $paytmParams["INDUSTRY_TYPE_ID"] = PAYTM_INDUSTRY_TYPE_ID;
    $paytmParams["CALLBACK_URL"] = PAYTM_CALLBACK_URL;
    $paytmChecksum = getChecksumFromArray($paytmParams, PAYTM_MERCHANT_KEY);
    $transactionURL = PAYTM_TXN_URL;
    // $transactionURL = "https://securegw-stage.paytm.in/theia/processTransaction";
    // $transactionURL = "https://securegw.paytm.in/theia/processTransaction"; // for production
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>index.html</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/styles.min.css?h=0f730bb1b2f6b1e5ab578c20e98ddf29">
</head>

<body>
    <nav class="navbar navbar-dark bg-dark navbar-expand-md navigation-clean-button">
        <div class="container"><a class="navbar-brand" href="#"><b>Margaret</b></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link active" href="#">About Us</a></li>
                    <li class="nav-item"><a class="nav-link active" href="#">Contact Us</a></li>
                   
                </ul>
                <span class="navbar-text actions"> <a class="login" href="#">Log In</a><a class="btn btn-green action-button" role="button" href="#">Sign Up</a></span>
            </div>
        </div>
    </nav>
    <section class="article-list">
        <div class="container">
            <div class="intro" style="padding: 50px;">
                <h2 class="text-center">Learn These Courses via Mentor</h2>
                <p class="text-center">Learn Awsome Course on Real Time Mentor's Instructions</p>
            </div>
            <div class="row articles">
                
                <div class="col-sm-6 col-md-4 item" style="text-align: center; margin-bottom: 20px;"><a href="#"><img class="img-fluid" src="static/python.png"></a>
                    <h3 class="name">Python</h3>
                    <p class="description"></p>
                    <p class="description">Price : 100 /-</p><a class="action" href="#"></a>
                    <form method='post' action='<?php echo $transactionURL; ?>' name='f1'>
                        <?php
                            foreach($paytmParams as $name => $value) {
                                echo '<input type="hidden" name="' . $name .'" value="' . $value . '">';
                            }
                        ?>
                        <input type="hidden" name="CHECKSUMHASH" value="<?php echo $paytmChecksum ?>">

                        <input class="btn btn-primary" type="submit" value="Enroll Now"/>
                    </form>
                    <!-- <script type="text/javascript">
                        document.f1.submit();
                    </script> -->
>
                </div>
                <div class="col-sm-6 col-md-4 item" style="text-align: center; margin-bottom: 20px;"><a href="#"><img class="img-fluid" src="static/django.jpg"></a>
                    <h3 class="name">Django</h3>
                    <p class="description">Price : 100 /-</p><a class="action" href="#"></a><button class="btn btn-primary" type="button">Enroll Now</button>
                </div>
                <div class="col-sm-6 col-md-4 item" style="text-align: center;margin-bottom: 20px;"><a href="#"><img class="img-fluid" src="static/machinelearning.jpeg"></a>
                    <h3 class="name">Machine Learning</h3>
                    <p class="description">Price : 100 /-</p><a class="action" href="#"></a><button class="btn btn-primary" type="button">Enroll Now</button>
                </div>
                <div class="col-sm-6 col-md-4 item" style="text-align: center; margin-bottom: 20px;"><a href="#"><img class="img-fluid" src="static/html.jpg"></a>
                    <h3 class="name">HTML</h3>
                    <p class="description">Price : 100 /-</p>
                    <p></p><button class="btn btn-primary" type="button">Enroll Now</button><a class="action" href="#"></a>
                </div>
                <div class="col-sm-6 col-md-4 item" style="text-align: center; margin-bottom: 20px;"><a href="#"><img class="img-fluid" src="static/css.jpg"></a>
                    <h3 class="name">CSS</h3>
                    <p class="description">Price : 100 /-</p><a class="action" href="#"></a><button class="btn btn-primary" type="button">Enroll Now</button>
                </div>
                <div class="col-sm-6 col-md-4 item" style="text-align: center; margin-bottom: 20px;"><a href="#"><img class="img-fluid" src="static/javascript.jpg"></a>
                    <h3 class="name">Javascript</h3>
                    <p class="description">Price : 100 /-</p><a class="action" href="#"></a><button class="btn btn-primary" type="button">Enroll Now</button>
                </div>
            </div>
        </div>
    </section>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    
</body>

</html>