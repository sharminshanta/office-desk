<!-- Security question -->
<div class="row">
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-header">
                <div class="pull-left">
                    <h2>Security Questions</h2>
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="widget-body">
                <div class="row">
                    <div class="col-md-12">
                        <form class="form" method="post" action="" id="pupdate_puForm">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">First Question</label>
                                        <select class="form-control"
                                                name="user[security_questions_one]">
                                            <option value="" hidden="hidden">Please select one</option>
                                            <option value="What is your pet’s name?">
                                                What is your pet’s name?
                                            </option>
                                            <option value="In what year was your father born?">
                                                In what year was your father born?
                                            </option>
                                            <option value="What is your favorite color?">
                                                What is your favorite color?
                                            </option>
                                            <option value="What is your favorite game?">
                                                What is your favorite game?
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group form-group">
                                        <label class="control-label">Answer</label>
                                        <input type="text" class="form-control"
                                               name="user[security_questions_one_answer]" placeholder="Answer One">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Second Question</label>
                                        <select class="form-control"
                                                name="user[security_questions_two]">
                                            <option value="" hidden="hidden">Please select one</option>
                                            <option value="What is your pet’s name?">
                                                What is your pet’s name?
                                            </option>
                                            <option value="In what year was your father born?">
                                                In what year was your father born?
                                            </option>
                                            <option value="What is your favorite color?">
                                                What is your favorite color?
                                            </option>
                                            <option value="What is your favorite game?">
                                                What is your favorite game?
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Answer</label>
                                        <input type="text" class="form-control" name="user[security_questions_two_answer]" placeholder="Answer Two">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <br>
                                    <p><i class="fa fa-info-circle"></i> <i>Note: Be careful to choose questions and must set always different question your harden security</i></p>
                                    <br>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success"
                                    id="pu_btnUpdate">Update
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<! -- Change password -->
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
               Password
            </div>
            <div class="panel-body">
                <form method="post" action="/profile/security/change_password" id="scpassword_scpForm">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group>
                                <label class="control-label">Current Password *</label>
                                <input required="required" type="password" class="form-control"
                                       name="current_password" placeholder="Current Password">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group>
                                <label class="control-label">New Password *</label>
                                <input required="required" type="password" class="form-control" name="new_password"
                                       placeholder="New Password">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group>
                                <label class="control-label">Confirm Password *</label>
                                <input required="required" type="password" class="form-control"
                                       name="confirm_password" placeholder="Confirm Password">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <br>
                            <p><i class="fa fa-info-circle"></i> <i>Note: Be careful to choose password. Strong passwords always harden your security</i></p>
                            <br>
                        </div>
                    </div>
                    <input name="csrf_token" type="hidden" value="{{ csrf_token }}">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <button class="btn btn-success" id="scpassword_btnCPass">Change Password</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>