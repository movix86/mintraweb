@if(Auth::user()::where('id',5))
                            ES UN TRADER
                        @elseif(Auth::guard('admin')->check())
                            ES UN ADMIN
                        @endif