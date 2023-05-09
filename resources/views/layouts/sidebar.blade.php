<div id="sidebar-menu">

    <ul class="metismenu" id="side-menu">

        <li class="menu-title">Navigation</li>

        <li>
            <a href="{{ route('dashboard') }}">
                <i class="fe-airplay"></i>
                <span> Dashboard </span>
            </a>
        </li>

        <li>
            <a href="javascript: void(0);">
                <i class="fe-sidebar"></i>
                <span>  Master Category </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{ route('category.index') }}">Category</a></li>
                <li><a href="{{ route('category-detail.index') }}">Category Detail</a></li>
                <li><a href="{{ route('category-detail.create') }}">Create Category Detail</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);">
                <i class="fe-file-plus"></i>
                <span> Transaction </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{ route('transaction.index') }}">List Transaction</a></li>
                <li><a href="{{ route('transaction.create') }}">Create Transaction</a></li>
            </ul>
        </li>
    </ul>
</div>