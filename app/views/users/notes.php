<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h3>USER DETAILS &raquo; <?php echo $details['user']->first_name . " " . $details['user']->last_name; ?></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs" role="tablist">
                <li class="<?php echo (($this->uri->segment(4)) == 'overview' ? 'active' : '')?>"><a
                        href="/users/details/<?php echo $details['user']->uuid; ?>/overview">Overview</a></li>
                <li id="nav_generalInformation2" class="<?php echo (($this->uri->segment(2)) == 'profile' ? 'active' : '')?>"><a
                        href="/users/profile/<?php echo $details['user']->uuid; ?>">Profile</a>
                </li>
                <li id="nav_generalInformation3" class="<?php echo (($this->uri->segment(2)) == 'notes' ? 'active' : '')?>"><a
                        href="/users/notes/<?php echo $details['user']->uuid; ?>/notes">Notes</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-header">
                <div class="pull-left">
                    <h2>Add Notes</h2>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="widget-body">
                <div class="row">
                    <div class="col-md-12">
                        <form class="form" method="post" action="/user-manager/user/{{ user.uuid }}/notes" id="pupdate_puForm">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="notes">{{ "Notes" | trans }}</label>
                                        <textarea class="form-control" name="note[note]" style="width: 80%"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label for="notes">{{ "Locked" | trans }}</label>
                                        <select class="form-control" name="note[is_locked]">
                                            <option value="1">Locked</option>
                                            <option value="0" selected="selected">Unlocked</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label for="notes">{{ "Private" | trans }}</label>
                                        <select class="form-control" name="note[is_private]">
                                            <option value="1">Private</option>
                                            <option value="0" selected="selected">Public</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label for="notes">{{ "Sticky" | trans }}</label>
                                        <select class="form-control" name="note[is_sticky]">
                                            <option value="1">Sticky</option>
                                            <option value="0" selected="selected">Non Sticky</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <input name="csrf_token" type="hidden" value="{{ csrf_token }}">
                            <button type="submit" class="btn btn-success"
                                    id="pu_btnUpdate">{{ "Add Note" | trans }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-header">
                <div class="pull-left">
                    <h2>All Notes</h2>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="widget-body">
                <div class="row">
                    <div class="col-md-12">
                        {% for note in notes %}
                        <p>{{ note.note }}</p>
                        <p>
                            <small class="note-meta">- {{ note.created_by.profile.first_name }} at {{ note.created | date("Y-m-d h:i A", loggedInUser.info.profile.timezone ?: "UTC") }}<br>
                                {{ note.is_sticky == 1 ? '<i class="fa fa-sticky-note"></i> Sticky' : '' }}</span>&nbsp;
                                {{ note.is_private == 1 ? '<i class="fa fa-info"></i> Private' : '' }}</span>&nbsp;
                                {{ note.is_locked == 1 ? '<i class="fa fa-lock"></i> Locked' : '' }}</span>&nbsp;
                            </small>
                        </p>
                        <hr>
                        {% endfor %}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>