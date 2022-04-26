<ul class="flex border-b border-gray-300 text-sm font-medium text-gray-600 mt-3 px-6 md:px-0">
    <li class="mr-8 {{Request::is('settings/profile')?'text-indigo-600 border-b-2 border-indigo-500':'hover:text-gray-900'}}"><a href="{{route('profile')}}" class="py-4 inline-block">Profile Info</a></li>
    <li class="mr-8 {{Request::is('settings/security')?'text-indigo-600 border-b-2 border-indigo-500':'hover:text-gray-900'}}"><a href="{{route('security')}}" class="py-4 inline-block">Security</a></li>
    <li class="mr-8 {{Request::is('settings/billing')?'text-indigo-600 border-b-2 border-indigo-500':'hover:text-gray-900'}}"><a href="{{route('billing')}}" class="py-4 inline-block">Billing</a></li>
  </ul>
