Project started 😀😬✊🍺👏
## xdl laravel
- 添加后台模块 [Laravel-admin](https://github.com/z-song/laravel-admin)
- 模型类统一放置在 app/Models下

## 相关包

- [barryvdh/laravel-debugbar](https://github.com/barryvdh/laravel-debugbar)
- [caouecs/Laravel-lang](https://github.com/caouecs/Laravel-lang)
- [markdown编辑](https://simplemde.com/)

## sql

    users       用户信息 
    identities    用户身份
    users_identities 用户信息身份关联  (还未建)
    questions    问题信息
    techtags     问题标签
    questions_techtags      问题信息 与 问题标签关联表
    questions_comments      问题评论表
        question_id comment 
    notifications    通知表(用户提问，email通知给指定用户)
    operating   操作表(用户对问题的操作)
        int user_id int question_id bool voteup bool votedown bool collection
    posts   文章信息

    Todo: 基于问题评论表的评论
    

## FAQ
    withInput 可以代替 old功能
    [评论系统设计](http://ratwu.com/2011/11/comment/)