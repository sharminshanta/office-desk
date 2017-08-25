<div class="container-fluid">
    <div class="content-area">
        <!-- Content is here -->
        <!--<div class="widget">
            <div class="widget-header">
                <div class="pull-left">
                    <h3 class="panel-title">Update Profile</h3>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="widget-body">
                <form class="form" method="post" action="/profile/update" id="pupdate_puForm">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="firstName">First Name</label>
                                <input name="first_name" type="text" value="" class="form-control" placeholder="First name">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="firstName">Last Name</label>
                                <input name="last_name" type="text" value="" class="form-control" placeholder="Last name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="family_name">Family Name</label>
                                <input name="family_name" type="text" value="" class="form-control" placeholder="Family Name">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="nick_name">Nick Name</label>
                                <input name="nick_name" type="text" value="" class="form-control" placeholder="Nick Name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <select name="title" class="form-control">
                                    <option value="" hidden>Choose one</option>
                                    <option value="Mr">Mr</option>
                                    <option value="Mrs">Mrs</option>
                                    <option value="Miss">Miss</option>
                                    <option value="Ms">Ms</option>
                                    <option value="Dr">Dr</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success" id="pu_btnUpdate">Update</button>
                </form>
            </div>
        </div>-->
        <!--        <div class="row">
                    <div class="col-md-12">
                        <div class="jumbotron">
                            <h2>API Key Details</h2>
                            <p>Manage your developer account. Manage your credentials. All in one place to integrate our platform
                                with third party tools and libraries.</p>

                            <p>
                                <strong>Name of API Key: </strong>{{ apikey.name }}<br>
                                <strong>Description: </strong>{{ apikey.description }} <br><br>
                                <strong>Your API Key: </strong> {{ apikey.api_keys }}
                            </p>
                            <p>
                            <form method="post"
                                  action="/developers/api_keys/{{ apikey.uuid }}/delete">
                                <input name="csrf_token" type="hidden" value="{{ csrf_token }}">
                                <button type="submit" class="btn btn-danger cApiKey_btn">
                                    <i class="fa fa-remove"></i> &nbsp; Set Role
                                </button>
                            </form>
                            </p>
                        </div>
                    </div>
                </div>-->
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Welcome, {{ user.profile.first_name }} {{ user.profile.last_name }}</h3>
                    </div>
                    <div class="panel-body col-sm-offset-3" id="leftQuickActionPanel">
                        <div style="height: 220px;display: table-cell;vertical-align: middle; text-align: center;">
                            <a class="btn btn-primary" href="/credentials/oauth_clients">oAuth2 Clients</a>
                            <a class="btn btn-primary" href="/credentials/api_keys">API Keys</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Important Information</h3>
                    </div>
                    <div class="panel-body" id="infoPanel">
                        <div class="notice notice-danger">
                            <a target="_blank" href="https://besofty.com/">
                                Learn more
                            </a>
                            To assign role permission
                        </div>
                        <div class="notice notice-info">
                            <a target="_blank" href="https://besofty.com/">
                                Learn more
                            </a>
                            To assign role permission
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">oAuth2 Clients</h3>
                    </div>
                    <div class="panel-body">
                        {% if not clients is empty %}
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Name of Client</th>
                                <th>Client ID</th>
                                <th>Status</th>
                                <th>Created</th>
                            </tr>
                            </thead>
                            <tbody>
                            {% for client in clients %}
                            <tr>
                                <td>
                                    <a href="/credentials/oauth_clients/{{ client.uuid }}">{{ client.client_name }}</a>
                                </td>
                                <td>{{ client.client_id }}</td>
                                <td>{{ client.is_active == 1 ? "Enabled" : "Disabled" }}</td>
                                <td>{{ client.created | date("Y-m-d h:i A", currentUser.timezone ?: "UTC") }}</td>
                            </tr>
                            {% endfor %}
                            </tbody>
                        </table>
                        {% else %}
                        <div class="row">
                            <div class="col-lg-2 col-lg-offset-5">
                                <a href="/credentials/oauth_clients" class="btn btn-outlined btn-primary">Please add a
                                    Oauth Client</a>
                            </div>
                        </div>
                        {% endif %}
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Api Keys</h3>
                    </div>
                    <div class="panel-body">
                        {% if not apikeys is empty %}
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Api Key</th>
                                <th>Status</th>
                                <th>Created</th>
                            </tr>
                            </thead>
                            <tbody>
                            {% for apikey in apikeys %}
                            <tr>
                                <td>
                                    <a href="/credentials/api_keys/{{ apikey.uuid }}">{{ apikey.name }}</a>
                                </td>
                                <td>{{ apikey.api_keys }}</td>
                                <td>{{ apikey.is_active == 1 ? "Enabled" : "Disabled" }}</td>
                                <td>{{ apikey.created | date("Y-m-d h:i A", currentUser.timezone ?: "UTC") }}</td>
                            </tr>
                            {% endfor %}
                            </tbody>
                        </table>
                        {% else %}
                        <div class="row">
                            <div class="col-lg-2 col-lg-offset-5">
                                <a href="/credentials/api_keys" class="btn btn-outlined btn-primary">Please add a Api
                                    Key</a>
                            </div>
                        </div>
                        {% endif %}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>