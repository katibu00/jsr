<li class="menu-item {{($route=='observer.home')?'active':''}}">
    <a href="{{ route('observer.home') }}" class="menu-link">
      <i class="menu-icon tf-icons ti ti-home"></i>
      <div data-i18n="Summary">Summary</div>
    </a>
</li>
<li class="menu-item {{($route=='result.collation')?'active':''}}">
  <a href="{{ route('result.collation') }}" class="menu-link">
    <i class="menu-icon tf-icons ti ti-chart-line"></i>
    <div data-i18n="Collation">Collation</div>
  </a>
</li>
<li class="menu-item {{($route=='result.pdf')?'active':''}}">
  <a href="{{ route('result.pdf') }}" class="menu-link">
    <i class="menu-icon tf-icons ti ti-download"></i>
    <div data-i18n="Report (PDF)">Report (PDF)</div>
  </a>
</li>




