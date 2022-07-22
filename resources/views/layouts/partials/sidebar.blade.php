<ul class="nav nav-list">
    <li class="">
        <b class="arrow"></b>
    </li>

    <li class="{{ (request()->segment(1) == 'portal' ) ? 'active' : '' }} ">
        <a href="/portal">
            <i class="menu-icon fa fa-tachometer"></i>
            <span class="menu-text"> Dashboard </span>
        </a>
        <b class="arrow"></b>
    </li>
    <li class="{{ (request()->segment(1) == 'targetsubbid' || request()->segment(1) == 'targetbid' ) ? 'open' : '' }}">
        <a href="" class="dropdown-toggle">
            <i class="menu-icon fa fa-500px"></i>
            <span class="menu-text"> Renstra </span>
            <b class="arrow fa fa-angle-down"></b>
        </a>
        <b class="arrow"></b>
        <ul class="submenu">
            @if (auth()->user()->role != '3')
                <li class="{{ (request()->segment(1) == 'targetbid' ) ? 'active' : '' }} ">
                    <a href="/targetbid">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Target Bidang
                    </a>
                    <b class="arrow"></b>
                </li>    
            @endif
            @if (auth()->user()->role != '2' )
                <li class="{{ (request()->segment(1) == 'targetsubbid' ) ? 'active' : '' }} ">
                    <a href="/targetsubbid">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Target Seksi / Subbag
                    </a>
                    <b class="arrow"></b>
                </li>    
            @endif
           
           
        </ul>
    </li>
    <li class="{{ (request()->segment(1) == 'realsubbid'
             || request()->segment(1) == 'realbid' 
             || request()->segment(1) == 'realkadis'
             || request()->segment(1) == 'realskpd' ) ? 'open' : '' }}">
        <a href="" class="dropdown-toggle">
            <i class="menu-icon fa fa-line-chart"></i>
            <span class="menu-text"> Realisasi </span>
            <b class="arrow fa fa-angle-down"></b>
        </a>
        <b class="arrow"></b>
        <ul class="submenu">
            @if (auth()->user()->role != '3')
                <li class="{{ (request()->segment(1) == 'realbid' ) ? 'active' : '' }} ">
                    <a href="/realbid">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Realisasi Bidang
                    </a>
                    <b class="arrow"></b>
                </li>     
            @endif
            @if (auth()->user()->role != '2')
                <li class="{{ (request()->segment(1) == 'realsubbid' ) ? 'active' : '' }} ">
                    <a href="/realsubbid">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Realisasi Seksi / Subbag
                    </a>
                    <b class="arrow"></b>
                </li>   
            @endif
            @if (auth()->user()->role == '1' || auth()->user()->role == '5')
                <li class="{{ (request()->segment(1) == 'realkadis' ) ? 'active' : '' }} ">
                    <a href="/realkadis">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Realisasi Kadis
                    </a>
                    <b class="arrow"></b>
                </li>   
            
                <li class="{{ (request()->segment(1) == 'realskpd' ) ? 'active' : '' }} ">
                    <a href="/realskpd">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Realisasi SKPD
                    </a>
                    <b class="arrow"></b>
                </li>    
            @endif
        </ul>
    </li>
    @if (auth()->user()->role != '3')
        <li class="{{ (request()->segment(1) == 'verisubbid' || request()->segment(1) == 'veribid' ) ? 'open' : '' }}">
            <a href="" class="dropdown-toggle">
                <i class="menu-icon fa fa-check"></i>
                <span class="menu-text"> Verifikasi </span>
                <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>
            <ul class="submenu">    
               @if (auth()->user()->role != '2')
                <li class="{{ (request()->segment(1) == 'Verifikasi Bidang' ) ? 'active' : '' }} ">
                    <a href="/veribid">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Verifikasi Capaian Bidang
                    </a>
                    <b class="arrow"></b>
                </li>      
               @endif 
                <li class="{{ (request()->segment(1) == 'Verifikasi Sub Bidang' ) ? 'active' : '' }} ">
                    <a href="/verisubbid">
                        <i class="menu-icon fa fa-caret-right"></i>
                        Verifikasi Capaian Seksi / Subbag
                    </a>
                    <b class="arrow"></b>
                </li>  
            
            </ul>
        </li>
    @endif
    <li class="{{ (request()->segment(1) == 'report' ) ? 'active' : '' }} ">
        <a href="/report">
            <i class="menu-icon fa fa-file-text-o"></i>
            <span class="menu-text"> Laporan </span>
        </a>
        <b class="arrow"></b>
    </li>

    @if (auth()->user()->role == 1 || auth()->user()->role == 5)
    <li class="{{ (request()->segment(1) == 'kinerja' || request()->segment(1) == 'indicator' ||
        request()->segment(1) == 'skpd'  || request()->segment(1) == 'kinerja_skpd' ||
         request()->segment(1) == 'akses' ) ? 'open' : '' }} ">
        <a href="" class="dropdown-toggle">
            <i class="menu-icon fa fa-cog"></i>
            <span class="menu-text"> Setup </span>
            <b class="arrow fa fa-angle-down"></b>
        </a>
        <b class="arrow"></b>
        <ul class="submenu">
            <li class="{{ (request()->segment(1) == 'kinerja' ) ? 'active' : '' }} ">
                <a href="/kinerja">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Kinerja
                </a>
                <b class="arrow"></b>
            </li>    
            <li class="{{ (request()->segment(1) == 'indicator' ) ? 'active' : '' }} ">
                <a href="/indicator">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Indikator
                </a>
                <b class="arrow"></b>
            </li>  
            <li class="{{ (request()->segment(1) == 'skpd' ) ? 'active' : '' }} ">
                <a href="/skpd">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Nama SKPD
                </a>
                <b class="arrow"></b>
            </li>   
            <li class="{{ (request()->segment(1) == 'kinerja_skpd' ) ? 'active' : '' }} ">
                <a href="/kinerja_skpd">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Kinerja SKPD
                </a>
                <b class="arrow"></b>
            </li>     
            <li class="{{ (request()->segment(1) == 'akses' ) ? 'active' : '' }} ">
                <a href="/akses">
                    <i class="menu-icon fa fa-caret-right"></i>
                    Hak Akses
                </a>
                <b class="arrow"></b>
            </li>    
        </ul>
    </li>
    @endif
</ul>