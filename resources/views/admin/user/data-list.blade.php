<div class="table-responsive">
    <table id="userTable" class="table card-table table-vcenter text-nowrap datatable">
        <thead>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Created</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody style="min-height: 500px;">
            @if(@count(@$users) > 0)
                @foreach($users as $user)
                    <tr>
                        <td width="15%"><a href="{{route('user.edit', ['id'=>$user->id])}}" class="text-reset" tabindex="-1">{{$user->user_name}}</a></td>
                        <td width="20%">{{$user->email}}</td>
                        <td width="20%">{{date('Y-m-d H:i:s',strtotime($user->created_at))}}</td>
                        <td width="15%">
                            @if($user->role_id == 1) Admin @else Client @endif
                        </td>
                        <td width="10%">
                            <a href="{{route('user.edit', ['id'=>$user->id])}}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                    <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                    <line x1="16" y1="5" x2="19" y2="8" />
                                  </svg>
                            </a>
                            <a href="#" data-id="{{$user->id}}" data-bs-toggle="modal" data-bs-target="#deleteModal" class="deleteModal">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <line x1="4" y1="7" x2="20" y2="7" />
                                    <line x1="10" y1="11" x2="10" y2="17" />
                                    <line x1="14" y1="11" x2="14" y2="17" />
                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                  </svg>
                            </a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
