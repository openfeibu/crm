<div class="main">
    <div class="layui-card fb-minNav">
        <div class="layui-breadcrumb" lay-filter="breadcrumb" style="visibility: visible;">
            <a href="{{ guard_url('home') }}">{{ trans('app.home') }}</a><span lay-separator="">/</span>
            <a href="{{ route('category.index') }}"><cite>{{ trans('category.title') }}</cite></a><span lay-separator="">/</span>
            <a><cite>{{ trans('app.add') }}{{ trans('category.name') }}</cite></a>
        </div>
    </div>
    <div class="main_full">
        {!! Theme::partial('message') !!}
        <div class="layui-col-md12">
            <div class="fb-main-table">
                <form class="layui-form" action="{{guard_url('category')}}" method="post" lay-filter="fb-form">
                    <div class="layui-form-item fb-form-item2">
                        <label class="layui-form-label">上级 *</label>

                        <div class="layui-input-block">
                            <select name="parent_id" id="parent_id" lay-filter="parent_id">
                                <option value="0">顶级</option>
                                @foreach($categories as $key => $cat)
                                    <option value="{{ $cat['id'] }}">{!! $cat['name'] !!}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <div class="layui-form-item fb-form-item2">
                        <label class="layui-form-label">{{ trans('supplier.name') }} *</label>

                        <div class="layui-input-block">
                            @inject('supplierRepository','App\Repositories\Eloquent\SupplierRepository')
                            <select name="supplier_id" id="supplier_id">
                                <option value="0">默认上级</option>
                                @foreach($supplierRepository->suppliers() as $key => $supplier)
                                    <option value="{{ $supplier['id'] }}">{!! $supplier['name'] !!}({{ $supplier->code }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="layui-form-mid layui-word-aux">非必选，如 Best virgin hair - Lace 分类下，选了A仓，则该分类下的所有子分类默认为 A仓（除非子类选了其他仓）</div>
                    </div>
                    <div class="layui-form-item fb-form-item2">
                        <label class="layui-form-label">{{ trans('attribute.name') }} *</label>

                        <div class="layui-input-block">
                            @inject('attributeRepository','App\Repositories\Eloquent\AttributeRepository')
                            <select name="attribute_id" id="attribute_id">
                                <option value="0">默认上级</option>
                                @foreach($attributeRepository->orderBy('id','asc')->get() as $key => $attribute)
                                    <option value="{{ $attribute['id'] }}">{!! $attribute['name'] !!}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="layui-form-mid layui-word-aux">非必选，如 Best virgin hair，选了 属性尺寸，则该分类下的所有子分类默认属性尺寸（除非子类选了其他属性）。该分类下的商品将采用该属性</div>
                    </div>

                    <div class="layui-form-item fb-form-item2">
                        <label class="layui-form-label">{{ trans('app.weight') }} *</label>

                        <div class="layui-input-inline">
                            <input name="weight" value="" class="layui-input layui-input-inline">
                        </div>
                        <div class="layui-form-mid layui-word-aux">kg</div>
                        <div class="layui-form-mid layui-word-aux">非必填，如 Best virgin hair，填了 0.5 ，则该分类下的所有子分类默认 0.5kg（除非子类填了其他重量）。该分类下的商品将采用该重量</div>
                    </div>

                    <div class="layui-form-item fb-form-item2">
                        <label class="layui-form-label">批量标志</label>

                        <div class="layui-input-block">
                            <input type="checkbox" name="split[/]" title="/" checked>
                        </div>
                        <div class="layui-form-mid layui-word-aux">比如"1B/613"，就不勾选该字段，此时批量应该换行</div>
                    </div>
                    <div class="layui-form-item fb-form-item2">
                        <label class="layui-form-label">{{ trans('category.label.name') }} *</label>

                        <div class="layui-input-block">
                            <textarea name="categories" placeholder="" class="layui-textarea"></textarea>
                        </div>

                        <div class="layui-form-mid layui-word-aux">批量（/或换行）</div>
                    </div>

                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn layui-btn-submit" lay-submit="" lay-filter="demo1">立即提交</button>
                        </div>
                    </div>
                    {!!Form::token()!!}
                </form>
            </div>

        </div>
    </div>
</div>
<script>
    layui.use(['jquery','element'], function() {
        var form = layui.form;
        var $ = layui.$;

        $(document).ready(function(){
            $("#parent_id").val("{{ $parent_id }}");
            form.render('select','parent_id');
        })

    })
</script>