<li class="menu-item {{($route=='agent.home')?'active':''}}">
    <a href="{{ route('agent.home') }}" class="menu-link">
      <i class="menu-icon tf-icons ti ti-home"></i>
      <div data-i18n="Home">Home</div>
    </a>
</li>
<li class="menu-item {{($route=='result.post')?'active':''}}">
  <a href="{{ route('result.post') }}" class="menu-link">
    <i class="menu-icon tf-icons ti ti-speakerphone"></i>
    <div data-i18n="Result Posting">Result Posting</div>
  </a>
</li>



