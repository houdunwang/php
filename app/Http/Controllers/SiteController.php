<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSiteRequest;
use App\Http\Requests\UpdateSiteRequest;
use App\Http\Resources\SiteResource;
use App\Models\Site;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    public function index()
    {
        $sites = Site::when(!is_super_admin(), function ($query) {
            $query->where('user_id', Auth::id());
        })->latest()->with('master')->paginate(10);

        return SiteResource::collection($sites);
    }

    public function store(StoreSiteRequest $request, Site $site)
    {
        $site->fill($request->input());
        $site->user_id = Auth::id();
        $site->save();

        return $this->success('站点添加成功', new SiteResource($site));
    }

    public function show(Site $site)
    {
        return $this->success(data: new SiteResource($site));
    }

    public function update(UpdateSiteRequest $request, Site $site)
    {
        $site->fill($request->input())->save();

        return $this->success('站点更新成功', data: $site->refresh());
    }

    public function destroy(Site $site)
    {
        $this->authorize('delete', $site);
        $site->delete();

        return $this->success('站点删除成功');
    }
}
