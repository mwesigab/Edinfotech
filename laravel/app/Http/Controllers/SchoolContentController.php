<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\ContentCategory;
use App\Models\ContentMeta;
use App\Models\Department;
use Illuminate\Http\Request;

class SchoolContentController extends Controller
{

    public function content_list()
    {
        $contentMenu = ContentCategory::with(['childs', 'filters' => function ($q) {
            $q->with(['tags']);
        }])->get();
        return view('schools.content.content_form', ['menus' => $contentMenu]);
    }

    public function new_content(Request $request)
    {
        $user = unserialize($request->session()->get('Admin'));
        $deptInfo = Department::where('dept_head_email',$user['email'])->first()->toArray();
        $study_class = 5;
        $education_level = $request->education_level;
        if($education_level=="1"){
            $study_class = $request->study_class_1;
        }else if($education_level=="2"){
            $study_class = $request->study_class_2;
        }else if($education_level=="3"){
            $study_class = $request->study_class_3;
        }

        $newContent = [
            'create_at'=>time(),
            'mode'=>'draft',
            'user_id'=>$user['id'],
            'school_id'=>$deptInfo['school_id'],
            'department_id'=>$deptInfo['id'],
            'education_level'=>$education_level,
            'study_class'=>$study_class,
            'type'=>$request->type,
            'private'=>$request->private,
            'title'=>$request->title,
            'content'=>$request->content,
        ];
        $content_id = Content::insertGetId($newContent);
        return redirect('/school/content/edit/' . $content_id);

    }

    public function contentForm()
    {
        $contentMenu = ContentCategory::with(['childs', 'filters' => function ($q) {
            $q->with(['tags']);
        }])->get();
        return view('schools.content.content_form', ['menus' => $contentMenu]);
    }

    public function edit_content($id)
    {
        $user = unserialize(session('Admin'));
        $item = Content::with('parts', 'filters')->where('id', $id)->where('user_id', $user['id'])->first();
        $meta = arrayToList($item->metas, 'option', 'value');

        if (isset($meta['precourse']) && $meta['precourse'] != '') {
            $preCourseContent = Content::where('mode', 'publish')->whereIn('id', explode(',', rtrim($meta['precourse'], ',')))->get();
        } else {
            $preCourseContent = [];
        }
        $contentMenu = ContentCategory::with(['childs', 'filters' => function ($q) {
            $q->with(['tags']);
        }])->get();
        return view('schools.content.content_edit', ['item' => $item, 'meta' => $meta, 'menus' => $contentMenu, 'preCourse' => $preCourseContent]);
    }

    public function contentEditStore($id, Request $request)
    {
        $user = unserialize($request->session()->get('Admin'));
        $request->request->add(['mode' => 'draft']);
        $content = Content::where('user_id', $user['id'])->find($id);

        if ($content) {
            $request = $request->all();
            print_r($request);
            if (isset($request['filters']) && count($request['filters']) > 0) {
                $content->filters()->sync($request['filters']);
            }
            unset($request['filters']);
            $content->update($request);
            echo 'true';
        } else {
            echo 'false';
        }

    }

    public function contentEditStoreRequest($id, Request $request)
    {
        $user = unserialize($request->session()->get('Admin'));
        $request->request->add(['mode' => 'request']);
        $content = Content::where('user_id', $user['id'])->find($id);

        if ($content) {
            $request = $request->all();
            print_r($request);
            if (isset($request['filters']) && count($request['filters']) > 0) {
                $content->filters()->sync($request['filters']);
            }
            unset($request['filters']);
            $content->update($request);
            echo 'true';
        } else {
            echo 'false';
        }

    }

    public function contentMetaStore($id, Request $request)
    {
        $user = unserialize($request->session()->get('Admin'));
        $content = Content::where('user_id', $user['id'])->find($id);
        if ($content) {
            ContentMeta::updateOrNew($content->id, $request->all());
            //echo $content->id;
        }
        echo $request->all();
    }
}
