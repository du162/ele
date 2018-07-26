## day1
开发任务
平台端： 
- 商家分类管理 
- 商家管理 
- 商家审核

商户端 
- 商家注册

要求 
- 商家注册时，同步填写商家信息，商家账号和密码 
- 商家注册后，需要平台审核通过，账号才能使用 
- 平台可以直接添加商家信息和账户，默认已审核通过


### 完成度
- 95% 测试阶段健壮性未做
- 商家注册时同时添加商家信息
- 平台审核 商家审核
## 难点

- post提交的时候需要添加密钥——》 {{ csrf_field() }}
- post提交的时候路由变成get不能传值 必须使用any
- 路由管理 平台与商户 需要理解
- 连表查询比较模糊

## day2
### 开发任务
- 完善day1的功能，使用事务保证商家信息和账号同时注册成功
- 平台：平台管理员账号管理
- 平台：管理员登录和注销功能，修改个人密码(参考微信修改密码功能)
- 平台：商户账号管理，重置商户密码
- 商户端：商户登录和注销功能，修改个人密码
- 修改个人密码需要用到验证密码功能,参考文档
- 商户状态不是1正常，则商家账号不能登录

### 完成度
- 96%  测试阶段健壮性未做
- 注册商户的同时添加商户信息  同时操作两张表
- 商户登录和注销功能，修改个人密码 商户状态登陆，商户账号启用 禁用
- 修改个人密码 重置密码

### 难点
- 注册添加商户信息ID 到 商户账号表中去
- 同时操作两张表 需要用到事务 一个失败另一个也失败
- 查看个人信息，修改个人密码，个人密码重置，需要用到当前登陆账号ID
- 修改密码需要验证旧密码 需要用到哈希值验证密码
```php
if (!Hash::check($request->post('password'), $user->password)) {
                $request->session()->flash('info', '您旧密码错误，请重新输入');
                return redirect()->back()->withInput();
            }
```

## DAY3
### 开发任务
商户端 
- 菜品分类管理 
- 菜品管理 
要求 
- 一个商户只能有且仅有一个默认菜品分类 
- 只能删除空菜品分类 
- 必须登录才能管理商户后台（使用中间件实现） 
- 可以按菜品分类显示该分类下的菜品列表 
- 可以根据条件（按菜品名称和价格区间）搜索菜品
### 完成度
- 99% 测试阶段健壮性未做
- 两张表 菜品管理表 菜品分类管理表
- 权限
- 搜索
### 难点
- 默认菜品分类 先判断是否添加默认菜品 要当前登陆ID 去查找菜品分类的状态是否为1 如果为1 就修改为0 让当前添加的默认菜品状态为1
- 搜索 连接Where不能用原生DB

## day4
### 开发任务
优化 
- 将网站图片上传到阿里云OSS对象存储服务，以减轻服务器压力(https://github.com/jacobcyl/Aliyun-oss-storage) 
- 使用webuploder图片上传插件，提升用户上传图片体验

平台 
- 平台活动管理（活动列表可按条件筛选 未开始/进行中/已结束 的活动） 
- 活动内容使用ueditor内容编辑器(https://github.com/overtrue/laravel-ueditor)

商户端 
- 查看平台活动（活动列表和活动详情） 
- 活动列表不显示已结束的活动
###  完成度
- 93%
- 平台活动管理(增删改查)
- 查看平台活动

### 难点
- OSS对象存储
