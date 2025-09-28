<!--  Start Header Area -->
<?php include"include/header.php"; ?>
<!-- End Header Area -->

    <div class="hom-top inner_style">

    <?php include"include/header-nav.php"; ?>


    <!-- LOGIN -->
    <section class="login_page" style="background-image:url('https://static.jeevansathi.com/images/jspc/commonimg/cover_img_free_chat.png');">
        <div class="login py-0 mt-0">
            <div class="container">
                <div class="row">

                    <div class="inn style_login row justify-content-between align-items-center">
                        <div class="lhs col-md-5">
                            <div class="tit">
                                <h2 class="text-white mb-0">Start for <b>Your <br> Matrimonial Profile</b> Easy and fast</h2>
                            </div>
                            <div class="im">
                                <img src="images/login-couple.png" alt="">
                            </div>
                            <div class="log-bg">&nbsp;</div>
                        </div>
                        <div class="rhs col-md-5">
                            <div>
                                <div class="form-login">
                                    <form method="POST" action="#!">
                                        <div class="row gx-3">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="lb">Candidate name <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="name" name="name" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="lb">Age <span class="text-danger">*</span></label>
                                                    <input type="number" class="form-control" id="mobile" name="mobile" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="lb">Email address <span class="text-danger">*</span></label>
                                                    <input type="email" class="form-control" id="email" name="email" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="lb">Sex <span class="text-danger">*</span></label>
                                                    <div class="InputGroup style_radio">
                                                        <input type="radio" name="gender" id="male" value="small" checked />
                                                        <label for="male">
                                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAAEOklEQVR4nO2Za4hVVRTHf+M7M0fFFCWHhBQGKwkcpaBIiogMDHQyxflQCEZoH0QRUnyUVFpqEaJCNCr5oUL0iy8YKnQoe6CoNaKmYKik5gslZ8yZkYXrwGJ5zr3nnHvuGYX5w4Z77ll7rb32Y63/2gc6cf9jMdAM/A8cB+qBl4GuTu4DlWsHTgO7gHnAEDoYl3VQvv0DLAMGqtyVCLmbwDqgf0c5sC5iYEG7pjP9UxG5Y8Cj5RpkF+AZ4C1gPjALqAWeBEa6gWwFzoUMsM38XgHMBPY6mUPAA1kOvAJ4BzhVYOYuAa3muUodng6cjOjzrrExUVcpeDdPt5PYLhkriix7WHvC9O8BzAFuOJlJzk5dhK6LwDdATZYHVJZ9PbAD+Ne9k0hUGaKnRgcTyAx17x8EWgpMiqzwglJCpFUmTo3R9xIqXwC+0yiztICuauBLYHLE+2Xq5Ang94htOzWNEzI7m52io+SDauCwsbs/qQI5jCtdBJHWRPkxGtjibMsqJ8L7buCn1KGyxWuTtf2ktRXZonfhORMe2/QQdScfXHYD36Irkgi7jBKZ9Tyx3M3+jKQKhpklvAoMCJF5CvhUw+oFTWgSVn8F1gIvGkInSeklpR37zQyfA37WfCP6LFYbB64DjyRxYLLpLPHe4lk1GiepCb9Z6CJJobYXGKd2xPlfHP2IjfdMx49MRPo45HBl3Vo1/1QoLQ/+P5LEgUWmY3Dy1zhD/wEbgFcMpx8EPA18aDJv0M7qtpAV7KczPBSYAHwdkjA/AXo6nhSbci80nVYB05zybSF0wEMoxRLgN51RSYiFUAXsdHZeAw6Y58fiOjDFdNqjFVTwXJ8VUwxBVyVvga2TWuUFzxJcYqfwsP15NsZMlorKEJLYrozWl6mRqHCe550P1ofY/j6pkgUhSsaTD14NsT07qRIpxs87JeXmQAFGObtXI+qMorDRR+J/L/JBf+eA5KVUmOTSeSG8oZTi9QzkKlyF5kvQ2Djs8kEhHIlZK8SV+8zYllySCrYY711ENsikNzKSG2BsC/lLhRNGidwBxZnZPzOSG2ts/0FK1BslDeaaMCp7n9cLL0qUGwj8aGwLD0uFx/XuMlDUrESvnFjkiF2z3v6lRp27eWtNQqoSYoSzdStGVIuF0RoJAsUSIcqBL4yNfboDMkONy4wPZ6mcOzXFNZM0ExfxcfCDcULq2yyxyejeTpnwvNufqS9dHcabUrU1Q72hsAXHX0DfEvUNBs6UcWXvwjD3uWhrkkLDoTfQaHSdjrjCyRy1ji1+laLMlC8xDUbHTf0KlBs+d07I9V+fmH2r3J1PO/A2OaOLXofYQTQVqdqkz5tKp22/uXQQugEbQ8q/3VoMDdetMkJLwoNOrkW/wXU4ZjvOFKf9nfeeLwYhXN/GuHps0fPzEPcoqpVRNmpYbNYLqt16UHMJk50gJ9wGL8sqPs38RQoAAAAASUVORK5CYII=" alt="cartoon-boy">
                                                            Male
                                                        </label>

                                                        <input type="radio" name="gender" id="female" value="small" />
                                                        <label for="female">
                                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAAEqElEQVR4nO2ZaYxeUxjHf4xSU1tDGw2hDbpoldiiNLE1BI2lpJKK0A+WSlM0ohJUfKCWSBEaPpCISUpaNKWJ6Yw0iJLYUksEVUuHFrW2aJnOyMP/nTxO7rn33HfeuSPMPznJzb3Pec5zznn2CwP472AvYCpwB7AEWAW8C7wDtAEtwG3AqcBg/iXYCZgGtALbge7E8SvwrDbTbzgPWFtC6Nh4AzizSsGHAc9lCNIJrAbuAi4ETgIOAyYAJwAz9O3NyEYeAfboa+GPBL4MFv4WuAXYvwSfkdrMTwGvT4FxfSX88cGCpvP3ynizcBqwDvhEt5GFfYBHgS7Hd6NuraE4RCftT31KhNY8zMJAqD+AecAOkTnnAj87+m+A0Y0S3gR6zzHfAIyNeKSLgA9yDPZVYHJkncOBTY7WbGXnRmxgoWO6BTg6+H4AMDvikV4CXst4/4xucMeAl/H+xdGZnfQKh8q71BjOB04EZor5mshJ/whcIwHtZm4FtmbQfa0ANwc4RWozN7CzrNtOxpKSPt30+B652hAm3NKSAa9bRl4X9gtOPzaM5hVgVo5H8hgntTRvk7KBbSVddA/mBYy2ysjMoFcAC5RG7F0Pc6nXUcC1wGPAy8qdOmQH3ouZLKWxyjG4hOoxM3AGpTAo8AbDqR77BsmfyZSE4VKR2uT19B86nBwrIs7hH2jOSLYeLzD054HNwAvAqAShDgTaFVPaFEdiaMnIXE3GJMO18P9ggWdZFixgmyhCezBnZQ7tUGBR4A2vz2P+viO8IkGY9RlxoAib65gzy9FbhReFj5a7JjB+IhDG9LQIbSVuoIZmR/8bOfC5/kSKYenwYhnbU8CIRBtYqZtoLbCBGo5IdSqLHeEaVVT9jYkKcDW5WoqIvRpZNLyT/sPdQUQ29RlfNGl6sIlOqUrVGBZ4HxP+/NTJY1QK1iZfTPW41K2/tp4Kbb5jYAZaNZa59W+qh8FYp3+did2CWIETlpVFmODqhq7e1Mc+J3oygX5GwgbOSeCz1NFbD6ou7C5/7T1SihEtyBH+5oT50zPSE5OlNBZFat2DE+ZOUT2xRQGrXbV0EUZnNLtsPFDPBn6InOJn6hM1GmOAzyNr2kGUxoYcVbB69tgGCn+cOhSx9SwSk9MY68FkdZ2R68ozRku3b+9lr3+wIn1e88CqsdNFP1uN4kzspuC1Wr0c2+2VwOvAh8DD+oGxKUOl5pbsLO8JXAd8EfCyluUZ6m7fr1h0kOaMkFZ8DAwpClx5HbFR6iCEJ2XGuhy4WioxUmlws54nqdm1PKMm6AZeVKaakobfEH7cJdD5y51XOEaex5eLTbqdPL1NHRuBy4I24zR166yjd3JGUdMRFvkXBHnHoIxJpkIhhkgvffM3dVhldVWkxvW1sOVESKZ17v3ZfsJD7oP9iMsKKtaQzcN4qY9VaW/LVrZp2PNb+jYnod/Z6tY9K0iva+/v8xP8CU5VMd2kzlnt/UdUh6/cupMkz1B5SN+h6EFW9AtHVxX/sPi7L5WigmZ/f8GM5/fESdZur+I/XHfCME/Wgxu1o+/d8KXcdrm/8IdEX6AJeDqQxY/vFJfMeQxgAP97/AmwgIEm8UbMNgAAAABJRU5ErkJggg==" alt="girl">
                                                            Female
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="lb">Mobile number <span class="text-danger">*</span></label>
                                                    <input type="number" class="form-control" id="mobile" name="mobile" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="lb">Alt. number (Optional)</label>
                                                    <input type="number" class="form-control" id="mobile" name="mobile" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="lb">Date of birth <span class="text-danger">*</span></label>
                                                    <input type="date" class="form-control" id="dob" name="dob" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="lb">Time of birth <span class="text-danger">*</span></label>
                                                    <input type="time" class="form-control" id="dob" name="dob" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="lb">Place of birth. (Optional)</label>
                                                    <input type="text" class="form-control" id="dobplace" name="dobplace" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label class="lb">Create password <span class="text-danger">*</span></label>
                                                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                <label class="lb">Profile For <span class="text-danger">*</span></label>
                                                <select class="chosen-select">
                                                    <option disabled="" selected="" value="">Select one</option>
                                                    <option>Self</option>
                                                    <option>Son</option>
                                                    <option>Daughter</option>
                                                    <option>Brother</option>
                                                    <option>Sister</option>
                                                    <option>Other</option>
                                                </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-12">
                                                <button type="submit" class="cta-dark w-100">Register Here</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <p class="mt-2 mb-0" style="font-size: 13px;    color: rgb(133, 136, 144);"><small>By clicking on 'Register Free', you confirm that you accept the <a href="#!" style="font-size:.935em;">Terms of use</a> and <a href="#!" style="font-size:.935em;">Privacy Policy.</a></small></p>
                                <div class="form-tit">
                                    <p class="text-white fw-bold mb-0">Already a Member? <a class="fw-bold" href="login.php">Login Here</a></p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- END -->

    
<!--  Start Footer Area -->
<?php include"include/footer.php"; ?>
<!-- End Footer Area -->     