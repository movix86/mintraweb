@if(Auth::user()::where('id',1))
                            ES UN TRADER
                        @elseif(Auth::guard('admin')->check())
                            ES UN ADMIN
                        @endif