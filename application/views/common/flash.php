<?php
    $message[''] = $this->session->set_userdata('success');
    //var_dump($message);
?>

<!--{% if message %}
    {% if message.success %}
        {% for message in message.success %}
            <div class="notice notice-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ message | raw | trans }}
            </div>
        {% endfor %}
    {% else %}
        {% for message in message.error %}
            <div class="notice notice-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ message | raw | trans }}
            </div>
        {% endfor %}
    {% endif %}
{% endif %}-->