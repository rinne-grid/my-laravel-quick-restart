### Laravel5.5の勉強

以下のURL(中級者向けタスクリストで勉強を進めた)
https://readouble.com/laravel/5.1/ja/quickstart-intermediate.html

+ [x] タスク作成時のバリデーション
+ [x] タスク作成
+ [x] 既存タスクの表示
    + [x] TaskコントローラでTaskモデル（Eloquent ORM）で値をセット
    + [x] TaskRepositoryで依存注入
    + [x] ビューに表示
+ [x] 既存タスクの削除
    + [x] 認可を利用しない場合
    + [x] 認可を利用する場合
        + [x] make:policyによるポリシーの作成
        + [x] モデルとポリシーの関連付け
        + [x] authorize('destroy', $task);
