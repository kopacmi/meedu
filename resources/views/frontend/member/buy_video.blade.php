@extends('layouts.member')

@section('member')

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">我的视频</div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead class="text-center">
                            <tr>
                                <td>课程</td>
                                <td>视频</td>
                                <td>价格</td>
                                <td>时间</td>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($records as $record)
                                @if(!($video = $videos[$record['video_id']] ?? []))
                                    @continue
                                @endif
                                <tr class="text-center">
                                    <td>
                                        <a href="{{ route('course.show', [$video['course']['id'], $video['course']['slug']]) }}">{{ $video['course']['title'] }}</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('video.show', [$video['course']['id'], $video['id'], $video['slug']]) }}">{{$video['title']}}</a>
                                    </td>
                                    <td>
                                        @if($record['charge'] > 0)
                                            <span class="label label-danger">{{ $record['charge'] }} 元</span>
                                        @else
                                            <span class="label label-success">免费</span>
                                        @endif
                                    </td>
                                    <td>{{$record['created_at']}}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center color-gray" colspan="4">暂无数据</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 pt-10">
                <div class="text-right">
                    {{$records->render()}}
                </div>
            </div>
        </div>
    </div>

@endsection