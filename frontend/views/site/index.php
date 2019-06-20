
<?php
use yii\helpers\Url;
use yii\web\View ;

$this->title = 'Trang chủ | nhaphangviettrung247';
$this->registerJsFile('/js/script.js',['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerCssFile('/css/home.css');
?>
  
  <style>
      @media (min-width: 768px) {
            .box-register iframe {
              height: 450px;
            }
        }
        @media (max-width: 767px) {
            .box-register iframe {
              height: 500px;
            }
            
        }
        

        }
        .img_radius {
            border-radius:50%;
            border: 3px #fff solid;
        }
        .navbar-inverse.navbar-fixed-top.navbar{
            display: none;
        }
        .wrap > .container {
    padding: 70px 15px 20px;
    width: 100%;
    padding: 0;
    max-width: 100%;
}
.btn:hover, .btn:focus, .btn.focus {
    color: #fff;
    text-decoration: none;
}
.btn--bg-white {
    background: #fff;
    border-color: #fff;
    color: #c1392b;
    font-size: 16px;
    font-weight: 400;
    padding: 16px 30px;
    text-transform: uppercase;
}
.btn {
    font-family: "Roboto",Helvetica,Arial,sans-serif;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    background-image: none;
    border-radius: 5px;
    border: 2px solid #c1392b;
    box-shadow: none;
    display: inline-block;
    font-size: 16px;
    line-height: 1;
    outline: none;
    padding: 9px 15px;
    text-align: center;
    text-shadow: none;
    transition: all .3s ease;
    background: #c1392b;
    color: #282828;
    cursor: pointer;
    outline: 0;
    min-width: 125px;
    border-radius: 50px;
    font-weight: 400;
    color: #fff;
  }
  .btn--bg-white {
    background: #fff;
    border-color: #fff;
    color: #c1392b;
    font-size: 16px;
    font-weight: 400;
    padding: 16px 30px;
    text-transform: uppercase;
}
span.span_logo {
    font-size: 20px;
    font-weight: bold;
}
a:hover, a:focus {
    color: #fff;
    text-decoration: none;
}
/* .header-space {
    height: 69px;
} */
.header__logo{
    height: 57px;
    display: flex;
    justify-content: center;
    align-items: center;
}
  </style>


</head>

<body>
  <header class="header js-stickys">
    <div class="container">
      <div class="header__inner">
        <div class="header__logo">
          
          <a href="<?php Url::base(true) ?>" class="logo">
            <span class="span_logo">Nhaphangviettrung247</span>
          </a>
        </div>
        <div class="header__mobile">
          <span class="menu-icon js-toggle-menu is-show">
          <i></i>
          <i></i>
          <i></i>
        </span>
        </div>
        <div class="header__menu">
          <ul class="list-inline main-menu">
            <li class="list-inline-item"><a href="#list-service">Dịch Vụ</a>
            </li>
            <li class="list-inline-item"><a href="#price-service">Bảng Giá</a>
            </li>
            <!-- <li class="list-inline-item"><a href="#video-guide">Hướng dẫn</a>
            </li> -->
            <li class="list-inline-item"><a href="#footer">Liên hệ</a>
            </li>
          </ul>
          <div class="register">
            <a href="/site/signup" class="btn ">Đăng ký</a>
            <a href="/site/login" class="btn btn--outline">Đăng nhập</a>
          </div>
        </div>
      </div>
    </div>
  </header>
  <div class="header-space"></div>
  <main>
    <div class="box-hero bg-type-1">
      <div class="container">
        <h1 class="section-title">Nhaphangviettrung247<span style="display:block"> Đặt Hàng Taobao, Đặt hàng 1688 về Việt Nam</span></h1>
        <div class="section-description">Với hơn 8 năm kinh nghiệm, <b>3000+</b> shop đã chọn chúng tôi là đối tác nhập hàng</div>
        <div class="box-hero__content">
          <div class="box-hero__link"><a href="#reg_form" class="btn btn--bg-white">Đặt hàng ngay</a>
          </div>
          <div style="opacity: 0.5" class="box-hero__image">
            <img src="/images/dat-hang.png">
          </div>
        </div>
      </div>
    </div>
    <div class="box-image-text">
      <div class="container">
          <h2 class="section-title">Bạn đang gặp<span style="display:block"> những khó khăn nào sau đây?</span></h2>
        <div class="box-image-text__wrap">
          <div class="box-image-text__content">
            <ul class="list-icon">
              <li class="icon-search">Bạn đang tìm nguồn hàng để bắt đầu kinh doanh?</li>
              <li class="icon-tag">Bạn đã nhập hàng từ một vài nơi bỏ sỉ ở Việt Nam nhưng chất lượng hàng và giá nhập không được ưng ý?</li>
              <li class="icon-money">Bạn đang nhập hàng từ Quảng Châu nhưng chi phí, chất lượng dịch vụ của đối tác chưa làm bạn hài lòng?</li>
            </ul>
          </div>
          <div class="box-image-text__image">
            <img width="200" src="/images/problem.png">
          </div>
        </div>
      </div>
    </div>
    <div id="list-service" class="box-intro text-center padding-component">
      <div class="container">
        
        <h2 class="section-title">Chúng tôi sẽ giải quyết vấn đề của bạn</span></h2>
        <div class="section-description">Với các dịch vụ Order Hàng, Chuyển Hàng Ký Gửi, Chuyển Tiền.</div>
        <div class="box-intro__wrap row">
          <div class="box-intro__item col-md-4">
            <div class="box-intro__image">
              <img src="/images/order.png">
            </div>
            <h3 class="box-intro__title">ORDER HÀNG</h3>
            <div class="box-intro__description">Tiếp cận nguồn hàng phong phú giá sỉ trên các web hàng Trung Quốc như taobao.com, tmall.com, 1688.com.</div>
          </div>
          <div class="box-intro__item col-md-4">
            <div class="box-intro__image">
              <img src="/images/guihang.png">
            </div>
            <h3 class="box-intro__title">Ký gửi hàng</h3>
            <div class="box-intro__description">Chuyển hàng ký gửi với tốc độ ổn định, nhanh chóng. Bạn sẽ nhận được thông báo ngay khi hàng về Việt Nam.</div>
          </div>
          <div class="box-intro__item col-md-4">
            <div class="box-intro__image">
              <img src="/images/doitien.png">
            </div>
            <h3 class="box-intro__title">Chuyển tiền</h3>
            <div class="box-intro__description">Chuyển tiền với tỷ giá và phí rẻ nhất thị trường, chỉ sau 5 phút là nhận được tiền.</div>
          </div>
        </div>
      </div>
    </div>
    <div id="price-service" class="box-price">
      <div class="container">
        <h2 class="section-title">Bảng giá dịch vụ</h2>
        <div class="section-description">Bảng giá được công bố rõ ràng, công khai và nhất quán với hệ thống phần mềm.<span style="display:block">Tuyệt đối không có giá ảo, chi phí phát sinh.</span></div>
        <div class="box-price__wrap">
          <div class="box-price__order">
            <h3 class="box-price__title">BÁO GIÁ ORDER <span>(ĐHQC mua, kiểm hàng, vận chuyển về VN)</span></h3>
            <div class="box-price__content">
              <div class="box-price__step">
                <img src="/images/step.png" />
                <div>
                  <span>TIỀN HÀNG TRÊN WEB</span>
                  <span>PHÍ SHIP TRUNG QUỐC</span>
                  <span>PHÍ GIAO DỊCH</span>
                  <span>CƯỚC VẬN CHUYỂN</span>
                </div>
              </div>
              <div class="box-price__pay">
                <div class="title">Số tiền phải thanh toán =</div>
                <div class="pay-step">
                  <span>1</span>
                  <span>2</span>
                  <span>3</span>
                  <span>4</span>
                </div>
              </div>
              <div class="box-price__body">
                <div class="step first-step">TIỀN HÀNG TRÊN WEB: Giá sản phẩm niêm yết trên website</div>
                <div class="step second-step">PHÍ SHIP TRUNG QUỐC: Phí vận chuyển từ người bán tới kho hàng tại Trung quốc</div>
                <div class="step third-step">PHÍ GIAO DỊCH: Áp dụng theo bảng phí dưới đây</div>
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Cấp độ</th>
                      <th scope="col">Tổng tiền đơn mỗi tháng</th>
                      <th scope="col">Phí dịch vụ (% giá trị đơn)</th>
                      <th scope="col">Tiền cọc (% giá trị đơn)</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    <tr>
                      <th scope="row">Cấp 1</th>
                      <td>Từ 0 đến 50tr</td>
                      <td>7%</td>
                      <td>50%</td>
                    </tr>
                    <tr>
                      <th scope="row">Cấp 2</th>
                      <td>Từ 51tr đến 200tr</td>
                      <td>5%</td>
                      <td>50%</td>
                    </tr>
                    <tr>
                      <th scope="row">Cấp 3</th>
                      <td>Trên 200tr</td>
                      <td>4%</td>
                      <td>50%</td>
                    </tr>
                    <tr>
                      <th scope="row">Cấp 4</th>
                      <td>Liên hệ</td>
                      <td>1%</td>
                      <td>50%</td>
                    </tr>
                  </tbody>
                </table>
                <div class="step fourth-step">CƯỚC VẬN CHUYỂN CÂN NẶNG: Áp dụng theo mức phí dưới đây</div>
                <div class="group-content">
                    <!--p>Từ Quảng Châu về Hà Nội: <b>23.000</b> đ/kg</p>
                  <p>Từ Quảng Châu về Đà Nẵng: <b>30.000</b> đ/kg</p>
                  <p>Từ Quảng Châu về Sài Gòn: <b>34.000</b> đ/kg</p-->
                  <div class="box-price__content">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">Tổng cân nặng mỗi tháng</th>
                          <th scope="col">Về HN(đ/kg)</th>
                          <th scope="col">Về SG(đ/kg)</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Dưới 150kg</td>
                          <td>24.500</td>
                          <td>30.500</td>
                        </tr>
                        <tr>
                          <td>Từ 150kg đến 2000kg</td>
                          <td>23.500</td>
                          <td>29.500</td>
                        </tr>
                        <tr>
                          <td>Trên 2000kg</td>
                          <td>22.500</td>
                          <td>28.500</td>
                        </tr>
                        
                      </tbody>
                    </table>
                  </div>  
                  </br>
                  <p>(*) Chúng tôi chỉ tính phí dịch vụ cho hàng về đến kho tại Hà Nội hoặc TP.HCM, khách hàng sẽ đến kho lấy hoặc sẽ tự thanh toán thêm tiền vận chuyển từ kho về nhà.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="box-price__ship">
            <h3 class="box-price__title">BÁO GIÁ VẬN CHUYỂN HÀNG KÝ GỬI-SHIP HỘ <span>(Khách tự chuyển hàng về kho Quảng Châu)</span></h3>
            <div class="box-price__content">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Tổng cân nặng mỗi tháng</th>
                    <th scope="col">Về HN(đ/kg)</th>
                    <th scope="col">Về SG(đ/kg)</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                      <td>Dưới 150kg</td>
                      <td>24.500</td>
                      <td>30.500</td>
                    </tr>
                    <tr>
                      <td>Từ 150kg đến 2000kg</td>
                      <td>23.500</td>
                      <td>29.500</td>
                    </tr>
                    <tr>
                      <td>Trên 2000kg</td>
                      <td>22.500</td>
                      <td>28.500</td>
                    </tr>
                  <tr>
                    <td>Không đóng bao</td>
                    <td>14.000</td>
                    <td>27.000</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="box-loiich padding-component bg-type-2">
      <div class="container">
        <h2 class="section-title">5 lý do bạn nên chọn chúng tôi</h2>
        <div class="section-description">Một trong những công ty đầu tiên ở Việt Nam<span style="display:block">trong lĩnh vực đặt hàng trực tuyến</span></div>
        <div class="box-loiich__content">
          <div class="box-loiich__item">
            <div class="box-loiich__image">
              <img src="/images/loiich1.png">
            </div>
            <div class="box-loiich__description">Nhaphangviettrung247 áp dụng hệ thống phần mềm đặt hàng thông minh, quý khách chủ động chọn hàng trực tiếp trên website của xưởng tại Quảng Châu mà không phải qua bất kỳ bên trung gian nào khác.</div>
          </div>
          <div class="box-loiich__item">
            <div class="box-loiich__image">
              <img src="/images/loiich2.png">
            </div>
            <div class="box-loiich__description">Đội ngũ tư vấn kinh nghiệm, nhiệt tình và am hiểu tính chất cũng như đặc điểm các xưởng tại Quảng Châu. Luôn đảm bảo cho quý khách sự hài lòng khi hàng về tới Việt Nam.</div>
          </div>
          <div class="box-loiich__item">
            <div class="box-loiich__image">
              <img src="/images/loiich3.png">
            </div>
            <div class="box-loiich__description">Chi phí đơn hàng trên phần mềm là chi phí cuối cùng bạn phải thanh toán khi hàng về tới Việt Nam, tuyệt đối không có chi phí phát sinh khác.</div>
          </div>
          <div class="box-loiich__item">
            <div class="box-loiich__image">
              <img src="/images/loiich4.png">
            </div>
            <div class="box-loiich__description">Hàng hóa được chúng tôi kiểm tra kỹ tại kho Quảng Châu trước khi gửi về Việt Nam.</div>
          </div>
          <div class="box-loiich__item">
            <div class="box-loiich__image">
              <img src="/images/loiich5.png">
            </div>
            <div class="box-loiich__description">Quy trình làm việc chuyên nghiệp, linh động, nhanh chóng giúp bạn tiết kiệm thời gian và chi phí.</div>
          </div>
        </div>
      </div>
    </div>
  
    <div class="box-logo padding-component">
      <div class="container">
        <h2 class="section-title">Được tin tưởng bởi hơn 3000 shop bán hàng Online</h2>
        <div class="box-logo__content">
          <a target="_blank" href="https://www.beemart.vn/">
            <img src="/images/beemart.png" />
          </a>
          <a target="_blank" href="https://phukienchomeo.com/">
            <img src="/images/upet.png" />
          </a>
          <a target="_blank" href="https://gentleman70.com/">
            <img src="/images/gentleman.png" />
          </a>
          <a target="_blank" href="https://evashoes.com.vn/">
            <img src="/images/evashoes.png" />
          </a>
          <a target="_blank" href="http://celenamom.com/">
            <img src="/images/celenamom.png" />
          </a>
        </div>
      </div>
    </div>
    <!-- <div class="box-contact">
      <div class="container">
        <div class="box-contact__content">
          <span>Đăng ký đặt hàng để được tư vấn rõ hơn</span>
          <a href="#reg_form" class="btn btn--large btn--outline">Đăng ký ngay</a>
        </div>
      </div>
    </div> -->
  </main>
  
<
</body>

</html>

