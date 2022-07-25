<style>
      h1,
        h2,
        h3,
        h4,
        h5,
        h6 {}
        a,
        a:hover,
        a:focus,
        a:active {
            text-decoration: none;
            outline: none;
        }
        
        a,
        a:active,
        a:focus {
            color: #333;
            text-decoration: none;
            transition-timing-function: ease-in-out;
            -ms-transition-timing-function: ease-in-out;
            -moz-transition-timing-function: ease-in-out;
            -webkit-transition-timing-function: ease-in-out;
            -o-transition-timing-function: ease-in-out;
            transition-duration: .2s;
            -ms-transition-duration: .2s;
            -moz-transition-duration: .2s;
            -webkit-transition-duration: .2s;
            -o-transition-duration: .2s;
        }
        
        ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }
        img {
            max-width: 100%;
            height: auto;
        }
        section {
            padding: 60px 0;
           /* min-height: 100vh;*/
        }
        .footer {
            /*background: linear-gradient(105deg,#6e99e6 ,#093c94);*/
            padding-top: 80px;
            padding-bottom: 40px;
        }
/*END FOOTER SOCIAL DESIGN*/

        @media only screen and (max-width:768px) { 
            .single_footer{margin-bottom:30px;}
        }
        .single_footer h4 {
            color: #0dcaf0;
            margin-top: 0;
            margin-bottom: 25px;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 20px;
        }
        .single_footer h4::after {
            content: "";
            display: block;
            height: 2px;
            width: 40px;
            background: #0dcaf0;
            margin-top: 20px;
        }
        .single_footer p{color:#0dcaf0;}
        .single_footer ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }
        .single_footer ul li{}
        .single_footer ul li a {
            color: #0dcaf0;
            -webkit-transition: all 0.3s ease 0s;
            transition: all 0.3s ease 0s;
            line-height: 36px;
            font-size: 15px;
            text-transform: capitalize;
        }
        .single_footer ul li a:hover { color: #ff3666; }

        .single_footer_address{}
        .single_footer_address ul{}
        .single_footer_address ul li{color:#0dcaf0;}
        .single_footer_address ul li span {
            font-weight: 400;
            color: #0dcaf0;
            line-height: 28px;
        }
        .contact_social ul {
            list-style: outside none none;
            margin: 0;
            padding: 0;
        }

        /*START NEWSLETTER CSS*/
        .subscribe {
            display: block;
            position: relative;
            margin-top: 15px;
            width: 100%;
        }
        .subscribe__input {
            background-color: #fff;
            border: .5px solid #0dcaf0;
            border-radius: 5px;
            color: #333;
            display: block;
            font-size: 15px;
            font-weight: 500;
            height: 60px;
            letter-spacing: 0.4px;
            margin: 0;
            padding: 0 150px 0 20px;
            width: 100%;
        }
        @media only screen and (max-width:768px) { 
            .subscribe__input{padding: 0 50px 0 20px;}
        }

        .subscribe__btn {
            background-color: transparent;
            border-radius: 0 25px 25px 0;
            color: #01c7e9;
            cursor: pointer;
            display: block;
            font-size: 20px;
            height: 60px;
            position: absolute;
            right: 4px;
            top: 0;
            width: 60px;
        }
        .subscribe__btn i{transition: all 0.3s ease 0s;}
        @media only screen and (max-width:768px) { 
            .subscribe__btn{right:0px;}
        }

        .subscribe__btn:hover i{
            color:#ff3666;
        }
        button {
            padding: 0;
            border: none;
            background-color: transparent;
            -webkit-border-radius: 0;
            border-radius: 0;
        }
        /*END NEWSLETTER CSS*/

        /*START SOCIAL PROFILE CSS*/
        .social_profile {margin-top:40px;}
        .social_profile ul{
            list-style: outside none none;
            margin: 0;
            padding: 0;
        }
        .social_profile ul li{float:left;}
        .social_profile ul li a {
            text-align: center;
            border: 0px;
            text-transform: uppercase;
            transition: all 0.3s ease 0s;
            margin: 0px 5px;
            font-size: 18px;
            color: #0dcaf0;
            border-radius: 30px;
            width: 50px;
            height: 50px;
            line-height: 50px;
            display: block;
            border: 1px solid rgba(255,255,255,0.2);
        }
        @media only screen and (max-width:768px) { 
            .social_profile ul li a{margin-right:10px;margin-bottom:10px;}
        }
        @media only screen and (max-width:480px) { 
        .social_profile ul li a{
            width:40px;
            height:40px;
            line-height:40px;
        }
        }
        .social_profile ul li a:hover{
            background:#ff3666;
            border: 1px solid #ff3666;
            color:#0dcaf0;
            border:0px;
        }
        /*END SOCIAL PROFILE CSS*/
        .copyright {
            margin-top: 70px;
            padding-top: 40px;
            color:#0dcaf0;
            font-size: 15px;
            border-top: 1px solid rgba(255,255,255,0.4);
            text-align: center;
        }
        .copyright a{color:#01c7e9;transition: all 0.2s ease 0s;}
        .copyright a:hover{color:#ff3666;}
</style>
<div class="footer text-info">
    <div class="container">     
        <div class="row">                       
            <div class="col-lg-4 col-sm-4 col-xs-12">
                <div class="single_footer">
                    <!-- <h4>Services</h4> -->
                    <ul>
                        <li><a href="submit-product" title="submit-product">Submit Product</a></li>
                        <li><a href="login" title="login">Login</a></li>
                        <li><a href="register" title="register">Create your Account </a></li>
                        
                    </ul>
                </div>
            </div><!--- END COL --> 
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="single_footer single_footer_address">
                    <!-- <h4>Page Link</h4> -->
                    <ul>
                        <li><a href="#">Privacy</a></li>
                        <li><a href="#">Cookies</a></li>
                        <li><a href="#">Listing Guidelines</a></li>
                    </ul>
                </div>
            </div><!--- END COL -->
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="single_footer single_footer_address">
                    <h4>Subscribe today</h4>
                    <div class="signup_form">                           
                        <form action="#" class="subscribe" id="subscribersForm2">
                            <input type="text" name="email" id="email" class="subscribe__input" placeholder="Enter Email Address">
                            <button type="submit" class="subscribe__btn"><img src="images/partner.gif" class="img-fluid" alt="partner" width="30" > <i class="bi bi-envelope"></i></button>
                        </form>
                    </div>
                </div>
                <div class="social_profile">
                    <ul>
                        <li><a href="#"><i class="bi bi-facebook"></i></a></li>
                        <li><a href="https://twitter.com/j_m_a_b_c" target="_blank"><i class="bi bi-twitter"></i></a></li>
                        
                    </ul>
                </div>                          
            </div><!--- END COL -->         
        </div><!--- END ROW --> 
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-xs-12">
                <p class="copyright">Copyright © 2022 <a href="#">Apex Software Deals</a>.</p>
            </div><!--- END COL -->                 
        </div><!--- END ROW -->                 
    </div><!--- END CONTAINER -->
</div>

<script>
    $(function(){
        $("#subscribersForm").submit(function(e){
            e.preventDefault();
            $.ajax({
                url:"parsers/subscribe",
                method:"POST",
                data:$(this).serialize(),
                beforeload:function(){
                    $("#submitNow").html("<span class='spinner-grow spinner-grow-sm'></span> Working....")
                },
                success:function(data){
                    $("#submitNow").html('<img src="images/partner.gif" class="img-fluid" alt="partner" width="20" > Send me deals');
                    $("#subscribersForm")[0].reset();
                    successNow(data);
                }
            })
        })

        $("#subscribersForm2").submit(function(e){
            e.preventDefault();
            $.ajax({
                url:"parsers/subscribe",
                method:"POST",
                data:$(this).serialize(),
                beforeload:function(){
                    $(".subscriberBtn").html("<span class='spinner-grow spinner-grow-sm'></span>");
                    
                },
                success:function(data){
                    $(".subscribe__btn").html('<img src="images/partner.gif" class="img-fluid" alt="partner" width="30" > <i class="bi bi-envelope"></i>');
                    $("#subscribersForm2")[0].reset();
                    successNow(data);
                }
            })
        })
    })
</script>

