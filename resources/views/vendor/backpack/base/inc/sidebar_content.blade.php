{{-- This file is used to store sidebar items, inside the Backpack admin panel --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('post') }}"><i class="nav-icon la la-file-alt"></i> Posts</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('category') }}"><i class="nav-icon la la-stream"></i> Categories</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('tag') }}"><i class="nav-icon la la-tags"></i> Tags</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('news-letter-list') }}"><i class="nav-icon la la-mail-bulk"></i> News letter lists</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('page') }}"><i class="nav-icon la la-pager"></i> Pages</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('contact') }}"><i class="nav-icon la la-id-card"></i> Contacts</a></li>