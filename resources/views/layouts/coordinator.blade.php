<li class="menu-item {{($prefix=='/result')?'active open':''}}">
    <a href="javascript:void(0);" class="menu-link menu-toggle">
      <i class="menu-icon tf-icons ti ti-speakerphone"></i>
      <div data-i18n="Submit Result">Submit Result</div>
    </a>
    <ul class="menu-sub">
      <li class="menu-item {{($route=='result.post')?'active':''}}">
        <a href="{{ route('result.post') }}" class="menu-link">
          <div data-i18n="Post By PU"></div>
        </a>
      </li>
      <li class="menu-item {{($route=='result.post.ward')?'active':''}}">
        <a href="{{ route('result.post.ward') }}" class="menu-link">
          <div data-i18n="Post By Ward"></div>
        </a>
      </li>
    </ul>
  </li>

  <li class="menu-item {{($route=='coordinator.home')?'active':''}}">
    <a href="{{ route('coordinator.home') }}" class="menu-link">
      <i class="menu-icon tf-icons ti ti-home"></i>
      <div data-i18n="All Postings">All Postings</div>
    </a>
</li>