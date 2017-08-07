<div class="row">
    <div class="col-md-12">
        <div class="jumbotron">
            <h2>Update Profile</h2>
            <p>Update our general information, addresses, timezone, language to personalized your experience with
                our platform</p>
        </div>
    </div>
</div>
<!-- Profile Area -->
<div class="widget">
    <div class="widget-header">
        <div class="pull-left">
            <h3 class="panel-title">General Information</h3>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="widget-body">
        <form class="form" method="post" action="/profile/general/update" id="pupdate_puForm">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="firstName">First Name</label>
                        <input name="profile[first_name]" type="text"
                               value="<?php echo (isset($details['user']->first_name) ? $details['user']->first_name : ''); ?>" class="form-control" placeholder="First name">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="lastName">Last Name</label>
                        <input name="profile[last_name]" type="text"
                               value="<?php echo (isset($details['user']->last_name) ? $details['user']->last_name : ''); ?>" class="form-control" placeholder="Last name">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="firstName">Family Name</label>
                        <input name="profile[family_name]" type="text"
                               value="<?php echo (isset($details['user']->family_name) ? $details['user']->family_name : ''); ?>" class="form-control" placeholder="Family name">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="lastName">Nick Name</label>
                        <input name="profile[nick_name]" type="text"
                               value="<?php echo (isset($details['user']->nick_name) ? $details['user']->nick_name : ''); ?>" class="form-control" placeholder="Nick name">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <select name="profile[title]" class="form-control">
                            <option value="" hidden>Choose one</option>
                            <option value="Mr" <?php echo $details['user']->title == 'Mr' ? 'selected' : ''; ?>>Mr</option>
                            <option value="Mrs" <?php echo $details['user']->title == 'Mrs' ? 'selected' : ''; ?>>Mrs</option>
                            <option value="Miss" <?php echo $details['user']->title == 'Miss' ? 'selected' : ''; ?>>Miss</option>
                            <option value="Ms" <?php echo $details['user']->title == 'Ms' ? 'selected' : ''; ?>>Ms</option>
                            <option value="Dr" <?php echo $details['user']->title == 'Dr' ? 'selected' : ''; ?>>Dr</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="timezone">Timezone</label>
                        <select name="profile[timezone]" id="time" class="form-control">
                            <option value="" hidden>Choose one</option>
                            <?php
                                foreach ($timezones as $timezone) { ?>
                                    <option value="<?php echo $timezone; ?>" <?php echo ($timezone == $details['user']->timezone) ? 'selected' : ''?>>
                                        <?php echo $timezone; ?>
                                    </option>
                                <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select name="profile[gender]" class="form-control" style="color: grey">
                            <option value="" hidden>Choose one</option>
                            <option value="male" <?php echo ($details['user']->gender == 'male' ? 'selected' : '')?>>Male</option>
                            <option value="female" <?php echo ($details['user']->gender == 'female' ? 'selected' : '')?>>Female</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="birthdate">Date of birth</label>
                        <input name="profile[date_of_birth]" type="date" value="<?php echo isset($details['user']->date_of_birth) ?: ''?>" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="language">Language</label>
                        <select name="profile[language]" class="form-control" style="color: grey">
                            <option value="" hidden>Choose one</option>
                            <option value="bn_BD" <?php echo ($details['user']->language == 'bn_BD' ? 'selected' : "");?>>Bangla</option>
                            <option value="en_US" <?php echo ($details['user']->language == 'en_US' ? 'selected' : "");?>>English</option>
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success" id="pu_btnUpdate">Update</button>
        </form>
    </div>
</div>
<!-- Address Area -->
<div class="widget">
    <div class="widget-header">
        <div class="pull-left">
            <h3 class="panel-title">Primary Address</h3>
        </div>
        <br>
        <div class="clearfix"></div>
    </div>
    <div class="widget-body">
        <form class="form" method="post" action="/profile/general/addresses/primary" id="pu_puAddForm">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="street">Street Address *</label>
                        <input name="street" type="text" value="" class="form-control"
                               placeholder="Street" required="required">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="streetsecondary">Additional Street</label>
                        <input name="street_secondary" type="text" value=""
                               class="form-control" placeholder="Additional Street">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="city">City *</label>
                        <input required="required" name="city" type="text" value=""
                               class="form-control" placeholder="City name">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="state">State</label>
                        <input name="state" type="text" value="" class="form-control" placeholder="State name">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="postal_code">Postal Code</label>
                        <input name="postal_code" type="text" value=""
                               class="form-control" placeholder="Postal Code">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="country">Country *</label>
                        <select required="required" name="country" id="country" class="form-control">
                            <option value="" hidden>Choose one</option>
                            <option value="Afghanistan">Afghanistan</option>
                            <option value="Albania">Albania</option>
                            <option value="Algeria">Algeria</option>
                            <option value="American Samoa">American Samoa</option>
                            <option value="Andorra">Andorra</option>
                            <option value="Angola">Angola</option>
                            <option value="Anguilla">Anguilla</option>
                            <option value="Antartica">Antarctica</option>
                            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                            <option value="Argentina">Argentina</option>
                            <option value="Armenia">Armenia</option>
                            <option value="Aruba">Aruba</option>
                            <option value="Australia">Australia</option>
                            <option value="Austria">Austria</option>
                            <option value="Azerbaijan">Azerbaijan</option>
                            <option value="Bahamas">Bahamas</option>
                            <option value="Bahrain">Bahrain</option>
                            <option value="Bangladesh">Bangladesh</option>
                            <option value="Barbados">Barbados</option>
                            <option value="Belarus">Belarus</option>
                            <option value="Belgium">Belgium</option>
                            <option value="Belize">Belize</option>
                            <option value="Benin">Benin</option>
                            <option value="Bermuda">Bermuda</option>
                            <option value="Bhutan">Bhutan</option>
                            <option value="Bolivia">Bolivia</option>
                            <option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
                            <option value="Botswana">Botswana</option>
                            <option value="Bouvet Island">Bouvet Island</option>
                            <option value="Brazil">Brazil</option>
                            <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                            <option value="Brunei Darussalam">Brunei Darussalam</option>
                            <option value="Bulgaria">Bulgaria</option>
                            <option value="Burkina Faso">Burkina Faso</option>
                            <option value="Burundi">Burundi</option>
                            <option value="Cambodia">Cambodia</option>
                            <option value="Cameroon">Cameroon</option>
                            <option value="Canada">Canada</option>
                            <option value="Cape Verde">Cape Verde</option>
                            <option value="Cayman Islands">Cayman Islands</option>
                            <option value="Central African Republic">Central African Republic</option>
                            <option value="Chad">Chad</option>
                            <option value="Chile">Chile</option>
                            <option value="China">China</option>
                            <option value="Christmas Island">Christmas Island</option>
                            <option value="Cocos Islands">Cocos (Keeling) Islands</option>
                            <option value="Colombia">Colombia</option>
                            <option value="Comoros">Comoros</option>
                            <option value="Congo">Congo</option>
                            <option value="Congo">Congo, the Democratic Republic of the</option>
                            <option value="Cook Islands">Cook Islands</option>
                            <option value="Costa Rica">Costa Rica</option>
                            <option value="Cota D'Ivoire">Cote d'Ivoire</option>
                            <option value="Croatia">Croatia (Hrvatska)</option>
                            <option value="Cuba">Cuba</option>
                            <option value="Cyprus">Cyprus</option>
                            <option value="Czech Republic">Czech Republic</option>
                            <option value="Denmark">Denmark</option>
                            <option value="Djibouti">Djibouti</option>
                            <option value="Dominica">Dominica</option>
                            <option value="Dominican Republic">Dominican Republic</option>
                            <option value="East Timor">East Timor</option>
                            <option value="Ecuador">Ecuador</option>
                            <option value="Egypt">Egypt</option>
                            <option value="El Salvador">El Salvador</option>
                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                            <option value="Eritrea">Eritrea</option>
                            <option value="Estonia">Estonia</option>
                            <option value="Ethiopia">Ethiopia</option>
                            <option value="Falkland Islands">Falkland Islands (Malvinas)</option>
                            <option value="Faroe Islands">Faroe Islands</option>
                            <option value="Fiji">Fiji</option>
                            <option value="Finland">Finland</option>
                            <option value="France">France</option>
                            <option value="France Metropolitan">France, Metropolitan</option>
                            <option value="French Guiana">French Guiana</option>
                            <option value="French Polynesia">French Polynesia</option>
                            <option value="French Southern Territories">French Southern Territories</option>
                            <option value="Gabon">Gabon</option>
                            <option value="Gambia">Gambia</option>
                            <option value="Georgia">Georgia</option>
                            <option value="Germany">Germany</option>
                            <option value="Ghana">Ghana</option>
                            <option value="Gibraltar">Gibraltar</option>
                            <option value="Greece">Greece</option>
                            <option value="Greenland">Greenland</option>
                            <option value="Grenada">Grenada</option>
                            <option value="Guadeloupe">Guadeloupe</option>
                            <option value="Guam">Guam</option>
                            <option value="Guatemala">Guatemala</option>
                            <option value="Guinea">Guinea</option>
                            <option value="Guinea-Bissau">Guinea-Bissau</option>
                            <option value="Guyana">Guyana</option>
                            <option value="Haiti">Haiti</option>
                            <option value="Heard and McDonald Islands">Heard and Mc Donald Islands</option>
                            <option value="Holy See">Holy See (Vatican City State)</option>
                            <option value="Honduras">Honduras</option>
                            <option value="Hong Kong">Hong Kong</option>
                            <option value="Hungary">Hungary</option>
                            <option value="Iceland">Iceland</option>
                            <option value="India">India</option>
                            <option value="Indonesia">Indonesia</option>
                            <option value="Iran">Iran (Islamic Republic of)</option>
                            <option value="Iraq">Iraq</option>
                            <option value="Ireland">Ireland</option>
                            <option value="Israel">Israel</option>
                            <option value="Italy">Italy</option>
                            <option value="Jamaica">Jamaica</option>
                            <option value="Japan">Japan</option>
                            <option value="Jordan">Jordan</option>
                            <option value="Kazakhstan">Kazakhstan</option>
                            <option value="Kenya">Kenya</option>
                            <option value="Kiribati">Kiribati</option>
                            <option value="Democratic People's Republic of Korea">Korea, Democratic People's Republic of</option>
                            <option value="Korea">Korea, Republic of</option>
                            <option value="Kuwait">Kuwait</option>
                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                            <option value="Lao">Lao People's Democratic Republic</option>
                            <option value="Latvia">Latvia</option>
                            <option value="Lebanon">Lebanon</option>
                            <option value="Lesotho">Lesotho</option>
                            <option value="Liberia">Liberia</option>
                            <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                            <option value="Liechtenstein">Liechtenstein</option>
                            <option value="Lithuania">Lithuania</option>
                            <option value="Luxembourg">Luxembourg</option>
                            <option value="Macau">Macau</option>
                            <option value="Macedonia">Macedonia, The Former Yugoslav Republic of</option>
                            <option value="Madagascar">Madagascar</option>
                            <option value="Malawi">Malawi</option>
                            <option value="Malaysia">Malaysia</option>
                            <option value="Maldives">Maldives</option>
                            <option value="Mali">Mali</option>
                            <option value="Malta">Malta</option>
                            <option value="Marshall Islands">Marshall Islands</option>
                            <option value="Martinique">Martinique</option>
                            <option value="Mauritania">Mauritania</option>
                            <option value="Mauritius">Mauritius</option>
                            <option value="Mayotte">Mayotte</option>
                            <option value="Mexico">Mexico</option>
                            <option value="Micronesia">Micronesia, Federated States of</option>
                            <option value="Moldova">Moldova, Republic of</option>
                            <option value="Monaco">Monaco</option>
                            <option value="Mongolia">Mongolia</option>
                            <option value="Montserrat">Montserrat</option>
                            <option value="Morocco">Morocco</option>
                            <option value="Mozambique">Mozambique</option>
                            <option value="Myanmar">Myanmar</option>
                            <option value="Namibia">Namibia</option>
                            <option value="Nauru">Nauru</option>
                            <option value="Nepal">Nepal</option>
                            <option value="Netherlands">Netherlands</option>
                            <option value="Netherlands Antilles">Netherlands Antilles</option>
                            <option value="New Caledonia">New Caledonia</option>
                            <option value="New Zealand">New Zealand</option>
                            <option value="Nicaragua">Nicaragua</option>
                            <option value="Niger">Niger</option>
                            <option value="Nigeria">Nigeria</option>
                            <option value="Niue">Niue</option>
                            <option value="Norfolk Island">Norfolk Island</option>
                            <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                            <option value="Norway">Norway</option>
                            <option value="Oman">Oman</option>
                            <option value="Pakistan">Pakistan</option>
                            <option value="Palau">Palau</option>
                            <option value="Panama">Panama</option>
                            <option value="Papua New Guinea">Papua New Guinea</option>
                            <option value="Paraguay">Paraguay</option>
                            <option value="Peru">Peru</option>
                            <option value="Philippines">Philippines</option>
                            <option value="Pitcairn">Pitcairn</option>
                            <option value="Poland">Poland</option>
                            <option value="Portugal">Portugal</option>
                            <option value="Puerto Rico">Puerto Rico</option>
                            <option value="Qatar">Qatar</option>
                            <option value="Reunion">Reunion</option>
                            <option value="Romania">Romania</option>
                            <option value="Russia">Russian Federation</option>
                            <option value="Rwanda">Rwanda</option>
                            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                            <option value="Saint LUCIA">Saint LUCIA</option>
                            <option value="Saint Vincent">Saint Vincent and the Grenadines</option>
                            <option value="Samoa">Samoa</option>
                            <option value="San Marino">San Marino</option>
                            <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                            <option value="Saudi Arabia">Saudi Arabia</option>
                            <option value="Senegal">Senegal</option>
                            <option value="Seychelles">Seychelles</option>
                            <option value="Sierra">Sierra Leone</option>
                            <option value="Singapore">Singapore</option>
                            <option value="Slovakia">Slovakia (Slovak Republic)</option>
                            <option value="Slovenia">Slovenia</option>
                            <option value="Solomon Islands">Solomon Islands</option>
                            <option value="Somalia">Somalia</option>
                            <option value="South Africa">South Africa</option>
                            <option value="South Georgia">South Georgia and the South Sandwich Islands</option>
                            <option value="Span">Spain</option>
                            <option value="SriLanka">Sri Lanka</option>
                            <option value="St. Helena">St. Helena</option>
                            <option value="St. Pierre and Miguelon">St. Pierre and Miquelon</option>
                            <option value="Sudan">Sudan</option>
                            <option value="Suriname">Suriname</option>
                            <option value="Svalbard">Svalbard and Jan Mayen Islands</option>
                            <option value="Swaziland">Swaziland</option>
                            <option value="Sweden">Sweden</option>
                            <option value="Switzerland">Switzerland</option>
                            <option value="Syria">Syrian Arab Republic</option>
                            <option value="Taiwan">Taiwan, Province of China</option>
                            <option value="Tajikistan">Tajikistan</option>
                            <option value="Tanzania">Tanzania, United Republic of</option>
                            <option value="Thailand">Thailand</option>
                            <option value="Togo">Togo</option>
                            <option value="Tokelau">Tokelau</option>
                            <option value="Tonga">Tonga</option>
                            <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                            <option value="Tunisia">Tunisia</option>
                            <option value="Turkey">Turkey</option>
                            <option value="Turkmenistan">Turkmenistan</option>
                            <option value="Turks and Caicos">Turks and Caicos Islands</option>
                            <option value="Tuvalu">Tuvalu</option>
                            <option value="Uganda">Uganda</option>
                            <option value="Ukraine">Ukraine</option>
                            <option value="United Arab Emirates">United Arab Emirates</option>
                            <option value="United Kingdom">United Kingdom</option>
                            <option value="United States">United States</option>
                            <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                            <option value="Uruguay">Uruguay</option>
                            <option value="Uzbekistan">Uzbekistan</option>
                            <option value="Vanuatu">Vanuatu</option>
                            <option value="Venezuela">Venezuela</option>
                            <option value="Vietnam">Viet Nam</option>
                            <option value="Virgin Islands (British)">Virgin Islands (British)</option>
                            <option value="Virgin Islands (U.S)">Virgin Islands (U.S.)</option>
                            <option value="Wallis and Futana Islands">Wallis and Futuna Islands</option>
                            <option value="Western Sahara">Western Sahara</option>
                            <option value="Yemen">Yemen</option>
                            <option value="Yugoslavia">Yugoslavia</option>
                            <option value="Zambia">Zambia</option>
                            <option value="Zimbabwe">Zimbabwe</option>
                        </select>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="phone">Phone *</label>
                        <input required="required" name="phone" type="text" value="" class="form-control" placeholder="Phone">
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="fax">Fax</label>
                        <input name="fax" type="text" value=""
                               class="form-control" placeholder="Fax">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success" id="pupdate_btnAUpdate">Update</button>
        </form>
    </div>
</div>