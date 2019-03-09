<div class="panel panel-default">
    <div class="panel-heading">
        <a href="#">
            {{ $reply->owner->username }}
        </a> commented {{ $reply->created_at->diffForHumans() }}...
    </div>

    <div class="panel-body">
        {{ $reply->body }}
    </div>
</div>