<div class="navbar bg-neutral text-neutral-content shadow-md flex">
    <div>
        <button class="btn btn-ghost text-xl">Treasurer</button>
    </div>
    <div class="flex-1"></div>
    @auth
        <div class="dropdown dropdown-end">
            <div tabindex="0" role="button" class="avatar avatar-placeholder ">
                <div class="bg-primary text-primary-content w-12 rounded-full hover:ring-2 ring-secondary">
                    <span class="text-xm">
                        {{ Auth::user()->name[0] }}
                    </span>
                </div>
            </div>
            <ul tabindex="0" class="dropdown-content menu bg-base-200 rounded-box z-1 w-80 p-6 shadow-2xl mt-3">
                <div>
                    <div class="flex gap-3">
                        <div class="avatar avatar-placeholder">
                            <div class="bg-primary text-primary-content w-12 rounded-full">
                                <span class="text-xm"> {{ Auth::user()->name[0] }}</span>
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-md">
                                {{ Auth::user()->name }}
                            </span>
                            <span class="opacity-50">{{ Auth::user()->username }}</span>
                        </div>




                    </div>
                </div>
                <div class="divider"></div>
                {{-- <li>
                    <a>Profile</a>
                </li> --}}
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <li>
                        <button>
                            Logout
                        </button>
                    </li>
                </form>
            </ul>
        </div>
    @endauth
</div>
