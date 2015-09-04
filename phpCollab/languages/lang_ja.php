<?php
#Application name: PhpCollab
#Status page: 2
#Path by root: ../languages/lang_ja.php

//translator(s): Haraguchi Toru
$setCharset = "UTF-8";

$byteUnits = array('Bytes', 'KB', 'MB', 'GB');

$dayNameArray = array(1 =>"月曜日", 2 =>"火曜日", 3 =>"水曜日", 4 =>"木曜日", 5 =>"金曜日", 6 =>"土曜日", 7 =>"日曜日");

$monthNameArray = array(1=> "１月", "２月", "３月", "４月", "５月", "６月", "７月", "８月", "９月", "10月", "11月", "12月"); 

$status = array(0 => "顧客折衝完了", 1 => "完了", 2 => "未着手", 3 => "進行中", 4 => "保留中");

$profil = array(0 => "管理者", 1 => "プロジェクト・マネージャ", 2 => "ユーザー", 3 => "顧客ユーザー", 4 => "無効", 5 => "プロジェクトマネージャ管理者");

$priority = array(0 => "なし", 1 => "最低", 2 => "低", 3 => "中", 4 => "高", 5 => "最高");

$statusTopic = array(0 => "終了", 1 => "開催中");

$statusTopicBis = array(0 => "はい", 1 => "いいえ");

$statusPublish = array(0 => "はい", 1 => "いいえ");

$statusFile = array(0 => "承認済", 1 => "変更して承認済", 2 => "承認が必要", 3 => "承認は不要", 4 => "未承認");

$phaseStatus = array(0 => "未着手", 1 => "進行中", 2 => "完了", 3 => "保留中");

$requestStatus = array(0 => "新規", 1 => "進行中", 2 => "完了");

$invoiceStatus = array(0 => "作成中", 1 => "送付済", 2 => "収入済");

$strings["please_login"] = "ログインしてください";
$strings["requirements"] = "必要なシステムの条件";
$strings["login"] = "ログイン";
$strings["no_items"] = "表示するアイテムがありません";
$strings["logout"] = "ログアウト";
$strings["preferences"] = "プレファレンス";
$strings["my_tasks"] = "マイ・タスク";
$strings["edit_task"] = "タスクを編集";
$strings["copy_task"] = "タスクをコピー";
$strings["add_task"] = "タスクを追加";
$strings["delete_tasks"] = "タスクを削除";
$strings["assignment_history"] = "アサインメント履歴";
$strings["assigned_on"] = "アサイン日";
$strings["assigned_by"] = "アサインした人";
$strings["to"] = "To";
$strings["comment"] = "コメント";
$strings["task_assigned"] = "担当者 ";
$strings["task_unassigned"] = "担当者が決まっていません";
$strings["edit_multiple_tasks"] = "複数のタスクを編集";
$strings["tasks_selected"] = "タスクが選択されました。これらのタスクに新しい値を設定してください。現在の値を保持するには[変更なし]を選択してください。";
$strings["assignment_comment"] = "アサインメント・コメント";
$strings["no_change"] = "[変更なし]";
$strings["my_discussions"] = "マイ・ディスカッション";
$strings["discussions"] = "ディスカッション";
$strings["delete_discussions"] = "ディスカッションを削除";
$strings["delete_discussions_note"] = "注意: ディスカッションは一度削除すると再開できません。";
$strings["topic"] = "トピック";
$strings["posts"] = "ポスト";
$strings["latest_post"] = "最新のポスト";
$strings["my_reports"] = "マイ・レポート";
$strings["reports"] = "レポート";
$strings["create_report"] = "レポート作成";
$strings["report_intro"] = "ここでタスク・レポートの条件を設定して、レポートを生成した後に照会結果を保存してください。";
$strings["admin_intro"] = "プロジェクト設定";
$strings["copy_of"] = "コピー元 ";
$strings["add"] = "追加";
$strings["delete"] = "削除";
$strings["remove"] = "除去";
$strings["copy"] = "コピー";
$strings["view"] = "見る";
$strings["edit"] = "編集";
$strings["update"] = "アップデート";
$strings["details"] = "詳細";
$strings["none"] = "なし";
$strings["close"] = "閉じる";
$strings["new"] = "新規";
$strings["select_all"] = "すべて選択";
$strings["unassigned"] = "未割当";
$strings["administrator"] = "管理者";
$strings["my_projects"] = "マイ・プロジェクト";
$strings["project"] = "プロジェクト";
$strings["active"] = "アクティブ";
$strings["inactive"] = "非アクティブ";
$strings["project_id"] = "プロジェクト ID";
$strings["edit_project"] = "プロジェクトを編集";
$strings["copy_project"] = "プロジェクトをコピー";
$strings["add_project"] = "プロジェクトを追加";
$strings["clients"] = "顧客";
$strings["organization"] = "顧客の組織";
$strings["client_projects"] = "顧客のプロジェクト";
$strings["client_users"] = "顧客のユーザー";
$strings["edit_organization"] = "顧客の組織を編集";
$strings["add_organization"] = "顧客の組織を追加";
$strings["organizations"] = "顧客の組織";
$strings["info"] = "情報";
$strings["status"] = "ステータス";
$strings["owner"] = "オーナー";
$strings["home"] = "ホーム";
$strings["projects"] = "プロジェクト";
$strings["files"] = "ファイル";
$strings["search"] = "検索";
$strings["admin"] = "管理";
$strings["user"] = "ユーザー";
$strings["project_manager"] = "プロジェクト・マネージャー";
$strings["due"] = "納期";
$strings["task"] = "タスク";
$strings["tasks"] = "タスク";
$strings["team"] = "チーム";
$strings["add_team"] = "チーム・メンバー追加";
$strings["team_members"] = "チーム・メンバー";
$strings["full_name"] = "フル・ネーム";
$strings["title"] = "タイトル";
$strings["user_name"] = "ユーザー名";
$strings["work_phone"] = "職場の電話";
$strings["priority"] = "優先度";
$strings["name"] = "名前";
$strings["id"] = "ID";
$strings["description"] = "説明";
$strings["phone"] = "電話";
$strings["url"] = "URL";
$strings["address"] = "住所";
$strings["comments"] = "コメント";
$strings["created"] = "作成日";
$strings["assigned"] = "割当日";
$strings["modified"] = "変更日";
$strings["assigned_to"] = "担当者";
$strings["due_date"] = "納期";
$strings["estimated_time"] = "見積時間";
$strings["actual_time"] = "実際時間";
$strings["delete_following"] = "以下を削除しますか?";
$strings["cancel"] = "キャンセル";
$strings["and"] = "and";
$strings["administration"] = "管理";
$strings["user_management"] = "ユーザー管理";
$strings["system_information"] = "システム情報";
$strings["product_information"] = "製品情報";
$strings["system_properties"] = "システム・プロパティ";
$strings["create"] = "作成";
$strings["report_save"] = "このレポートをあなたのホームページに保存しておけば、再度実行できます。";
$strings["report_name"] = "レポート名";
$strings["save"] = "保存";
$strings["matches"] = "照合";
$strings["match"] = "照合";
$strings["report_results"] = "レポート結果";
$strings["success"] = "完了";
$strings["addition_succeeded"] = "追加完了";
$strings["deletion_succeeded"] = "削除完了";
$strings["report_created"] = "作成したレポート";
$strings["deleted_reports"] = "削除したレポート";
$strings["modification_succeeded"] = "変更完了";
$strings["errors"] = "エラー発生!";
$strings["blank_user"] = "ユーザーが見つかりません。";
$strings["blank_organization"] = "顧客の組織が見つかりません。";
$strings["blank_project"] = "プロジェクトが見つかりません。";
$strings["user_profile"] = "ユーザー・プロファイル";
$strings["change_password"] = "パスワード変更";
$strings["change_password_user"] = "ユーザーのパスワードを変更";
$strings["old_password_error"] = "現在のパスワードが間違っています。もう一度現在のパスワードを入力してください。";
$strings["new_password_error"] = "新しいパスワードの1回目と2回目が一致しません。もう一度新しいパスワードを入力してください。";
$strings["notifications"] = "通知";
$strings["change_password_intro"] = "現在のパスワード、新しいパスワードを2回入力してください。";
$strings["old_password"] = "現在のパスワード";
$strings["password"] = "パスワード";
$strings["new_password"] = "新しいパスワード";
$strings["confirm_password"] = "新しいパスワード(確認)";
$strings["email"] = "電子メール";
$strings["home_phone"] = "自宅の電話";
$strings["mobile_phone"] = "携帯電話";
$strings["fax"] = "ファックス";
$strings["permissions"] = "権限";
$strings["administrator_permissions"] = "管理者権限";
$strings["project_manager_permissions"] = "プロジェクトマネージャ権限";
$strings["user_permissions"] = "ユーザ権限";
$strings["account_created"] = "アカウント作成日";
$strings["edit_user"] = "ユーザ編集";
$strings["edit_user_details"] = "ユーザ・アカウントの詳細を編集";
$strings["change_user_password"] = "ユーザーのパスワードを変更";
$strings["select_permissions"] = "ユーザーの権限を選択";
$strings["add_user"] = "ユーザーを追加";
$strings["enter_user_details"] = "作成しようとしているユーザー・アカウントの詳細を入力してください。";
$strings["enter_password"] = "ユーザーのパスワードを入力してください。";
$strings["success_logout"] = "ログアウトしました。再びログインするにはこの下にユーザー名とパスワードを入力してください。";
$strings["invalid_login"] = "入力したユーザー名、パスワードのいずれかが無効です。もう一度ログインしてください。";
$strings["profile"] = "プロファイル";
$strings["user_details"] = "ユーザー・アカウントの詳細";
$strings["edit_user_account"] = "自分ののユーザー・アカウント情報を編集。";
$strings["no_permissions"] = "この操作をするためには充分な権限がありません。";
$strings["discussion"] = "ディスカッション";
$strings["retired"] = "リタイアした";
$strings["last_post"] = "最後の投稿";
$strings["post_reply"] = "返事を投稿";
$strings["posted_by"] = "投稿者";
$strings["when"] = "日時";
$strings["post_to_discussion"] = "投稿する";
$strings["message"] = "メッセージ";
$strings["delete_reports"] = "レポートを削除";
$strings["delete_projects"] = "プロジェクトを削除";
$strings["delete_organizations"] = "顧客の組織を削除";
$strings["delete_organizations_note"] = "注意：この操作を行うと、その組織に属するすべての顧客ユーザーが削除され、その顧客からのプロジェクトは関連性を失います。";
$strings["delete_messages"] = "メッセージを削除";
$strings["attention"] = "注意";
$strings["delete_teamownermix"] = "削除完了。ただし、プロジェクト・オーナーはプロジェクト・チームから削除できませんでした。";
$strings["delete_teamowner"] = "プロジェクト・オーナーをプロジェクトから削除することはできません。";
$strings["enter_keywords"] = "キーワードを入力";
$strings["search_options"] = "キーワードと検索のオプション";
$strings["search_note"] = "検索対象を入力する必要があります。";
$strings["search_results"] = "検索結果";
$strings["users"] = "ユーザー";
$strings["search_for"] = "検索対象";
$strings["results_for_keywords"] = "キーワードの検索結果";
$strings["add_discussion"] = "ディスカッションを追加";
$strings["delete_users"] = "ユーザー・アカウントを削除";
$strings["reassignment_user"] = "プロジェクトとタスクを割り当て直す";
$strings["there"] = "There are";
$strings["owned_by"] = "owned by the users above.";
$strings["reassign_to"] = "ユーザーを削除する前に、割り当てを解除してください。";
$strings["no_files"] = "リンクされたファイルはありません。";
$strings["published"] = "発行済み";
$strings["project_site"] = "プロジェクト・サイト";
$strings["approval_tracking"] = "承認を追跡";
$strings["size"] = "サイズ";
$strings["add_project_site"] = "プロジェクト・サイトに追加";
$strings["remove_project_site"] = "プロジェクトサイトから削除";
$strings["more_search"] = "もっと検索オプション";
$strings["results_with"] = "Find Results With";
$strings["search_topics"] = "トピックスを検索";
$strings["search_properties"] = "プロパティを検索";
$strings["date_restrictions"] = "日付の絞込み";
$strings["case_sensitive"] = "ケース・センシティブ";
$strings["yes"] = "はい";
$strings["no"] = "いいえ";
$strings["sort_by"] = "ソート";
$strings["type"] = "タイプ";
$strings["date"] = "日付";
$strings["all_words"] = "すべての単語を含む";
$strings["any_words"] = "いずれかの単語を含む";
$strings["exact_match"] = "完全一致";
$strings["all_dates"] = "すべての日付";
$strings["between_dates"] = "日付の間";
$strings["all_content"] = "すべての内容";
$strings["all_properties"] = "すべてのプロパティ";
$strings["no_results_search"] = "検索の結果、該当するものはありません。";
$strings["no_results_report"] = "レポートの結果、該当するものはありません。";
$strings["schema_date"] = "YYYY/MM/DD";
$strings["hours"] = "時間";
$strings["choice"] = "選択";
$strings["missing_file"] = "ファイルがありません。";
$strings["project_site_deleted"] = "プロジェクトサイトを削除しました。";
$strings["add_user_project_site"] = "ユーザーにプロジェクト・サイトへのアクセス権を与えました。";
$strings["remove_user_project_site"] = "ユーザーのプロジェクト・サイトへのアクセス権を解除しました。";
$strings["add_project_site_success"] = "プロジェクト・サイトに追加しました。";
$strings["remove_project_site_success"] = "プロジェクト・サイトから削除しました。";
$strings["add_file_success"] = "アイテムのリンクを追加しました。";
$strings["delete_file_success"] = "リンクを削除しました。";
$strings["update_comment_file"] = "ファイルのコメントを更新しました。";
$strings["session_false"] = "セッション・エラー";
$strings["logs"] = "ログ";
$strings["logout_time"] = "自動ログアウト";
$strings["noti_foot1"] = "このお知らせはPhpCollabが発信しています。";
$strings["noti_foot2"] = "あなたのPhpCollabのホームページは:";
$strings["noti_taskassignment1"] = "新しいタスク:";
$strings["noti_taskassignment2"] = "タスクがあなたにアサインされました:";
$strings["noti_moreinfo"] = "より詳しい情報は:";
$strings["noti_prioritytaskchange1"] = "タスクの優先度が変わりました:";
$strings["noti_prioritytaskchange2"] = "次のタスクの優先度が変わりました:";
$strings["noti_statustaskchange1"] = "タスクのステータスが変わりました:";
$strings["noti_statustaskchange2"] = "次のタスクのステータスが変わりました:";
$strings["login_username"] = "ユーザー名を入力してください。";
$strings["login_password"] = "パスワードを入力してください。";
$strings["login_clientuser"] = "これは顧客ユーザーのアカウントです。顧客ユーザーのアカウントではPhpCollabにはアクセスできません。";
$strings["user_already_exists"] = "この名前のユーザーが既に存在します。ほかのユーザー名を考えてください。";
$strings["noti_duedatetaskchange1"] = "タスクの納期が変わりました。";
$strings["noti_duedatetaskchange2"] = "次のタスクの納期が変わりました。:";
$strings["company"] = "会社";
$strings["show_all"] = "すべてを表示";
$strings["information"] = "情報";
$strings["delete_message"] = "このメッセージを削除";
$strings["project_team"] = "プロジェクト・チーム";
$strings["document_list"] = "文書リスト";
$strings["bulletin_board"] = "掲示板";
$strings["bulletin_board_topic"] = "掲示板のトピック";
$strings["create_topic"] = "新しいトピックを作成";
$strings["topic_form"] = "トピック・フォーム";
$strings["enter_message"] = "メッセージを入力してください。";
$strings["upload_file"] = "ファイルをアップロード";
$strings["upload_form"] = "フォームをアップロード";
$strings["upload"] = "アップロード";
$strings["document"] = "文書";
$strings["approval_comments"] = "承認コンテンツ";
$strings["client_tasks"] = "顧客のタスク";
$strings["team_tasks"] = "チームのタスク";
$strings["team_member_details"] = "プロジェクト・チームのメンバー明細";
$strings["client_task_details"] = "顧客のタスクの明細";
$strings["team_task_details"] = "チームのタスクの明細";
$strings["language"] = "言語";
$strings["welcome"] = "ようこそ";
$strings["your_projectsite"] = "あなたのプロジェクトサイトへ";
$strings["contact_projectsite"] = "外部ネットやこのサイトで見つかった情報についてのご質問は、プロジェクト・リーダーまでお問い合わせください。";
$strings["company_details"] = "会社の詳細";
$strings["database"] = "データベースのバックアップと復元";
$strings["company_info"] = "会社情報の編集";
$strings["create_projectsite"] = "プロジェクト・サイトを作成";
$strings["projectsite_url"] = "プロジェクト・サイトのURL";
$strings["design_template"] = "テンプレートをデザイン";
$strings["preview_design_template"] = "テンプレート・デザインをプレビュー";
$strings["delete_projectsite"] = "プロジェクト・サイトを削除";
$strings["add_file"] = "ファイルの追加";
$strings["linked_content"] = "リンク・コンテンツ";
$strings["edit_file"] = "ファイルの詳細を編集";
$strings["permitted_client"] = "許可された顧客ユーザー";
$strings["grant_client"] = "プロジェクト・サイトの閲覧を許可する";
$strings["add_client_user"] = "顧客ユーザーを追加";
$strings["edit_client_user"] = "顧客ユーザーを編集";
$strings["client_user"] = "顧客ユーザー";
$strings["client_change_status"] = "このタスクが完了したら、以下のステータスを変更してください。";
$strings["project_status"] = "プロジェクト・ステータス";
$strings["view_projectsite"] = "プロジェクト・サイトを見る";
$strings["enter_login"] = "新しいパスワードを受け取るには、ログイン名を入力してください。";
$strings["send"] = "送信";
$strings["no_login"] = "ログイン名が登録されていません。";
$strings["email_pwd"] = "パスワードが送信されました。";
$strings["no_email"] = "電子メール・アドレスが登録されていないログイン名です。";
$strings["forgot_pwd"] = "パスワードを忘れた場合？";
$strings["project_owner"] = "自分のプロジェクトだけが変更できます。";
$strings["connected"] = "接続中";
$strings["session"] = "セッション";
$strings["last_visit"] = "前回の接続";
$strings["compteur"] = "回数";
$strings["ip"] = "IP";
$strings["task_owner"] = "あなたはこのプロジェクトのチーム・メンバーではありません。";
$strings["export"] = "エクスポート";
$strings["browse_cvs"] = "CVSを閲覧";
$strings["repository"] = "CVSリポジトリ";
$strings["reassignment_clientuser"] = "タスクの再割り当て";
$strings["organization_already_exists"] = "その名前は既にシステム内で使われています。別の名前を選んでください。";
$strings["blank_organization_field"] = "顧客の組織の名前を入力する必要があります。";
$strings["blank_fields"] = "必須項目";
$strings["projectsite_login_fails"] = "ユーザー名とパスワードの組み合わせが正しいものと照合できません。";
$strings["start_date"] = "開始日";
$strings["completion"] = "完了日";
$strings["update_available"] = "アップデートが利用可能になっています。";
$strings["version_current"] = "現在ご利用のバージョンは";
$strings["version_latest"] = "最新のバージョンは";
$strings["sourceforge_link"] = "SourceForgeのプロジェクト・ページをご覧ください。";
$strings["demo_mode"] = "デモ・モードです。その操作はできません。";
$strings["setup_erase"] = "setup.phpを削除してください!!";
$strings["no_file"] = "ファイルが選択されていません。";
$strings["exceed_size"] = "ファイル・サイズが制限を越えています。";
$strings["no_php"] = "PHPファイルはだめです。";
$strings["approval_date"] = "承認日";
$strings["approver"] = "承認者";
$strings["error_database"] = "データベースに接続できません。";
$strings["error_server"] = "サーバーに接続できません。";
$strings["version_control"] = "バージョン管理";
$strings["vc_status"] = "ステータス";
$strings["vc_last_in"] = "最終更新日";
$strings["ifa_comments"] = "承認時のコメント";
$strings["ifa_command"] = "承認ステータスを変更";
$strings["vc_version"] = "バージョン";
$strings["ifc_revisions"] = "ピア・レビュー";
$strings["ifc_revision_of"] = "レビューしたバージョン";
$strings["ifc_add_revision"] = "ピア・レビューを追加";
$strings["ifc_update_file"] = "ファイルを更新";
$strings["ifc_last_date"] = "最終更新日";
$strings["ifc_version_history"] = "バージョン履歴";
$strings["ifc_delete_file"] = "ファイルをすべてのバージョンとレビューと一緒に削除";
$strings["ifc_delete_version"] = "選択したバージョンを削除";
$strings["ifc_delete_review"] = "選択したレビューを削除";
$strings["ifc_no_revisions"] = "現在この文書のりビジョンはありません。";
$strings["unlink_files"] = "ファイルのリンクを解除";
$strings["remove_team"] = "チーム・メンバーを削除";
$strings["remove_team_info"] = "これらのユーザーをプロジェクト・チームから削除しますか？";
$strings["remove_team_client"] = "プロジェクト・サイトを閲覧する権限を削除";
$strings["note"] = "ノート";
$strings["notes"] = "ノート";
$strings["subject"] = "題名";
$strings["delete_note"] = "ノートを削除";
$strings["add_note"] = "ノートを追加";
$strings["edit_note"] = "ノートを編集";
$strings["version_increm"] = "バージョン変更方法を選択してください:";
$strings["url_dev"] = "開発サイトのURL";
$strings["url_prod"] = "完成サイトのURL";
$strings["note_owner"] = "自分が作成したノードだけが変更可能です。";
$strings["alpha_only"] = "ログイン名は半角英数字だけが使用できます。";
$strings["edit_notifications"] = "電子メール通知を編集";
$strings["edit_notifications_info"] = "電子メールで通知を受け取りたいイベントを選択してください。";
$strings["select_deselect"] = "すべて選択/すべて解除";
$strings["noti_addprojectteam1"] = "プロジェクト・チームに選任されました :";
$strings["noti_addprojectteam2"] = "あなたは次のプロジェクトに選任されました :";
$strings["noti_removeprojectteam1"] = "プロジェクト・チームから解任されました :";
$strings["noti_removeprojectteam2"] = "あなたは次のプロジェクトから解任されました :";
$strings["noti_newpost1"] = "新しい投稿がありました :";
$strings["noti_newpost2"] = "投稿が次のディスカッションに追加されました :";
$strings["edit_noti_taskassignment"] = "新しいタスクにアサインされたとき";
$strings["edit_noti_statustaskchange"] = "タスクのステータスが変わったとき";
$strings["edit_noti_prioritytaskchange"] = "タスクの優先度が変わったとき";
$strings["edit_noti_duedatetaskchange"] = "タスクの納期が変わったとき";
$strings["edit_noti_addprojectteam"] = "新しいプロジェクトに選任されたとき";
$strings["edit_noti_removeprojectteam"] = "プロジェクトチームから解任されたとき";
$strings["edit_noti_newpost"] = "ディスカッションに新しい投稿があったとき";
$strings["add_optional"] = "Add an optional";
$strings["assignment_comment_info"] = "このタスクのアサインメントについて、コメントを追加";
$strings["my_notes"] = "マイ・ノート";
$strings["edit_settings"] = "設定を編集";
$strings["max_upload"] = "ファイルの最大サイズ";
$strings["project_folder_size"] = "プロジェクトのフォルダのサイズ";
$strings["calendar"] = "カレンダー";
$strings["date_start"] = "開始日";
$strings["date_end"] = "完了日";
$strings["time_start"] = "開始時刻";
$strings["time_end"] = "完了時刻";
$strings["calendar_reminder"] = "アラーム";
$strings["shortname"] = "短縮名";
$strings["calendar_recurring"] = "このイベントは毎週この曜日に反復";
$strings["edit_database"] = "データベースを編集";
$strings["noti_newtopic1"] = "新しいディスカッション :";
$strings["noti_newtopic2"] = "新しいディスカッションが次のプロジェクトに追加されました :";
$strings["edit_noti_newtopic"] = "新しいディスカッションの議題が作成されました。";
$strings["today"] = "今日";
$strings["previous"] = "前";
$strings["next"] = "次";
$strings["help"] = "ヘルプ";
$strings["complete_date"] = "完了日";
$strings["scope_creep"] = "Scope creep";
$strings["days"] = "日";
$strings["logo"] = "ロゴ";
$strings["remember_password"] = "パスワードを記憶";
$strings["client_add_task_note"] = "注意：入力されたタスクはデータベースに記録されますが、チーム・メンバーにアサインされて初めてここに表示されます！";
$strings["noti_clientaddtask1"] = "タスクが顧客によって追加されました :";
$strings["noti_clientaddtask2"] = "顧客によって、プロジェクト・サイトを通して次のプロジェクトに新しいタスクが追加されました :";
$strings["phase"] = "フェーズ";
$strings["phases"] = "フェーズ";
$strings["phase_id"] = "フェーズID";
$strings["current_phase"] = "進行中のフェーズ";
$strings["total_tasks"] = "総タスク";
$strings["uncomplete_tasks"] = "未完了タスク";
$strings["no_current_phase"] = "現在進行中のフェーズはありません。";
$strings["true"] = "はい";
$strings["false"] = "いいえ";
$strings["enable_phases"] = "フェーズを有効にする";
$strings["phase_enabled"] = "フェーズ有効";
$strings["order"] = "オーダー";
$strings["options"] = "オプション";
$strings["support"] = "サポート";
$strings["support_request"] = "サポート依頼";
$strings["support_requests"] = "サポート依頼";
$strings["support_id"] = "依頼ID";
$strings["my_support_request"] = "マイ・サポート依頼";
$strings["introduction"] = "紹介";
$strings["submit"] = "送信";
$strings["support_management"] = "サポート管理";
$strings["date_open"] = "開始日";
$strings["date_close"] = "終了日";
$strings["add_support_request"] = "サポート依頼を追加";
$strings["add_support_response"] = "サポート回答を追加";
$strings["respond"] = "回答する";
$strings["delete_support_request"] = "サポート依頼が削除されました。";
$strings["delete_request"] = "サポート依頼を削除";
$strings["delete_support_post"] = "サポート投稿を削除";
$strings["new_requests"] = "新しい依頼";
$strings["open_requests"] = "進行中の依頼";
$strings["closed_requests"] = "完了した依頼";
$strings["manage_new_requests"] = "新しい依頼の管理";
$strings["manage_open_requests"] = "進行中の依頼の管理";
$strings["manage_closed_requests"] = "完了した依頼の管理";
$strings["responses"] = "回答";
$strings["edit_status"] = "ステータスを編集";
$strings["noti_support_request_new2"] = "あなたは次のサポート依頼を発信しました : ";
$strings["noti_support_post2"] = "あなたのサポート依頼に新しい回答が追加されました。詳細は以下をご覧ください。";
$strings["noti_support_status2"] = "あなたのサポート依頼が更新されました。詳細は以下をご覧ください。";
$strings["noti_support_team_new2"] = "新しいサポート依頼が次のプロジェクトに追加されました : ";
//2.0
$strings["delete_subtasks"] = "サブタスクを削除";
$strings["add_subtask"] = "サブタスクを追加";
$strings["edit_subtask"] = "サブタスクを編集";
$strings["subtask"] = "サブタスク";
$strings["subtasks"] = "サブタスク";
$strings["show_details"] = "詳細を表示";
$strings["updates_task"] = "タスクの更新履歴";
$strings["updates_subtask"] = "サブタスクの更新履歴";
//2.1
$strings["go_projects_site"] = "プロジェクト・サイトを表示";
$strings["bookmark"] = "ブックマーク";
$strings["bookmarks"] = "ブックマーク";
$strings["bookmark_category"] = "カテゴリー";
$strings["bookmark_category_new"] = "新しいカテゴリー";
$strings["bookmarks_all"] = "すべて";
$strings["bookmarks_my"] = "マイ・ブックマーク";
$strings["my"] = "マイ";
$strings["bookmarks_private"] = "プライベート";
$strings["shared"] = "共有する";
$strings["private"] = "プライベート";
$strings["add_bookmark"] = "ブックマークを追加";
$strings["edit_bookmark"] = "ブックマークを編集";
$strings["delete_bookmarks"] = "ブックマークを削除";
$strings["team_subtask_details"] = "チームのサブタスクの詳細";
$strings["client_subtask_details"] = "顧客のサブタスクの詳細";
$strings["client_change_status_subtask"] = "サブタスクが完了したら、下のステータスを更新してください。";
$strings["disabled_permissions"] = "無効のアカウント";
$strings["user_timezone"] = "タイムゾーン(GMT)";
//2.2
$strings["project_manager_administrator_permissions"] = "上級プロジェクト管理者";
$strings["bug"] = "バグ追跡";
//2.3
$strings["report"] = "レポート";
$strings["license"] = "ライセンス";
//2.4
$strings["settings_notwritable"] = "Settings.php ファイルに書き込みできません";
//2.5
$strings["invoicing"] = "請求";
$strings["invoice"] = "請求書";
$strings["invoices"] = "請求書";
$strings["date_invoice"] = "請求日";
$strings["header_note"] = "ヘッダー注釈";
$strings["footer_note"] = "フッター注釈";
$strings["total_ex_tax"] = "税別合計金額";
$strings["total_inc_tax"] = "税込合計金額";
$strings["tax_rate"] = "税率";
$strings["tax_amount"] = "税額";
$strings["invoice_items"] = "請求内容明細";
$strings["amount_ex_tax"] = "税別金額";
$strings["completed"] = "完了";
$strings["service"] = "サーボス";
$strings["name_print"] = "Name printed";
$strings["edit_invoice"] = "請求書を編集";
$strings["edit_invoiceitem"] = "請求書の明細を編集";
$strings["calculation"] = "計算";
$strings["items"] = "項目";
$strings["position"] = "位置";
$strings["service_management"] = "サービス管理";
$strings["hourly_rate"] = "時間レート";
$strings["add_service"] = "サービスを追加";
$strings["edit_service"] = "サービスを編集";
$strings["delete_services"] = "サービスを削除";
$strings["worked_hours"] = "実働時間";
$strings["rate_type"] = "レートの種類";
$strings["rate_value"] = "レートの値";
$strings["note_invoice_items_notcompleted"] = "完了していない項目があります。";

$rateType = array(0 => "カスタム・レート", 1 => "プロジェクト用レート", 2 => "顧客用レート", 3 => "サービス用レート");

//HACKS

$strings["newsdesk"] = "ニュース・デスク";
$strings["newsdesk_list"] = "ニュース・リスト";
$strings["article_newsdesk"] = "ニュース本文";
$strings["update_newsdesk"] = "記事を更新";
$strings["my_newsdesk"] = "マイ・ニュース・デスク";
$strings["edit_newsdesk"] = "ニュース記事を編集";
$strings["copy_newsdesk"] = "ニュース記事をコピー";
$strings["add_newsdesk"] = "ニュース記事を追加";
$strings["del_newsdesk"] = "ニュース記事を削除";
$strings["delete_news_note"] = "注意：ニュースに付いている全てのコメントも削除します。";
$strings["author"] = "執筆者";
$strings["blank_newsdesk_title"] = "タイトルが空白です。";
$strings["blank_newsdesk"] = "そのニュースは見つかりませんでした。";
$strings["blank_newsdesk_comment"] = "コメントが空白です。";
$strings["remove_newsdesk"] = "ニュース記事を全てのコメントと共に削除しました。";
$strings["add_newsdesk_comment"] = "ニュース記事にコメントを追加";
$strings["edit_newsdesk_comment"] = "ニュース記事のコメントを編集";
$strings["del_newsdesk_comment"] = "ニュース記事のコメントを削除";
$strings["remove_newsdesk_comment"] = "ニュース記事のコメントを削除しました。";
$strings["errorpermission_newsdesk"] = "ニュース記事を編集したり削除したりするのに十分な権限がありません。";
$strings["errorpermission_newsdesk_comment"] = "ニュース記事のコメントを編集したり削除したりするのに十分な権限がありません。";
$strings["newsdesk_related"] = "関連するプロジェクト";
$strings["newsdesk_related_generic"] = "一般的なニュース(プロジェクトと無関係)";
$strings["newsdesk_related_links"] = "このニュースに関連するリンク";
$strings["newsdesk_rss"] = "このニュースのRSSを有効にする";
$strings["newsdesk_rss_enabled"] = "このニュースのRSSが有効になりました。";

$strings["noti_memberactivation1"] = "アカウントが有効になりました。";
$strings["noti_memberactivation2"] = "あなたは顧客応接システムphpCollabに参加しました。このシステムはお客様であるあなたがプロジェクトを見守るのを支援するために開発され、また継続的にアップグレードされています。\n\nシステムにアクセスするには、ウェブ・ブラウザ(Internet Explorer 6.x または Netscape Navigator 7.x を推奨)で YOUR DOMAIN HERE にアクセスして、以下の情報を入力してください :";
$strings["noti_memberactivation3"] = "ユーザー名 :";
$strings["noti_memberactivation4"] = "パスワード :";
$strings["noti_memberactivation5"] = "上記の情報を入力して \"enter\" を押すと、あなたのアカウントにアクセスすることができます。\n\nまた、この電子メールと同じようにアカウントの有効化やタスクの開始、その他あなたのアカウントに関連するイベントについてのお知らせが届きます。これらの電子メールは、あなたのプロジェクトが進行していることをお知らせするために発信しております。";

//BEGIN email project users mod
$strings["email_users"] = "ユーザーに電子メールを発信"; 
$strings["email_following"] = "以下に電子メールを発信"; 
$strings["email_sent"] = "電子メールを発信しました。"; 
//END email project users mod

$strings["clients_connected"] = "(顧客がプロジェクトサイトに接続中)"; 
?>