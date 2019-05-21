<form id="message-form" action="@if(!empty($route)) {{ $route }} @endif" method="POST" class="@if(!empty($hidden)) hidden @endif">
    @if(!empty($at) && $at == 'workgroup' && !empty($workgroup))
        <input name="workgroup_id" type="hidden" value="{{ $workgroup->id }}">
    @endif
     @if(!empty($message) && $message->isWorkgroupMessage())
        <input name="parent_workgroup_id" type="hidden" value="{{ $message->workgroup->id }}">
    @endif
    @csrf
    <div class="card @if(!empty($message)) hidden @endif" @if(!empty($message)) id="response-to-{{ $message->id }}" class="hidden" @endif>
        <div class="card-content">
            <div class="content">
                <div class="field">
                    <label class="label">Onderwerp</label>
                    <div class="control">
                        <input name="title" class="input" type="text" value="@if(!empty($message)) RE: {{ $message->title }} @endif">
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="field">
                    <label class="label">Bericht</label>
                    <div class="control">
                        <textarea name="body" class="textarea editor"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <footer class="card-footer">
            <a onclick="$('#message-form').submit();" href="#" class="card-footer-item hover-success">Verstuur</a>
        </footer>
    </div>
</form>
