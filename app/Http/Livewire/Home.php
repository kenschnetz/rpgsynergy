<?php

    namespace App\Http\Livewire;

    use App\Models\PostCategory as PostCategoryModel;
    use Livewire\Component;

    class Home extends Component {
        public function Render() {
            return view('livewire.list', ['post_categories' => $this->GetPosts()]);
        }

        private function GetPosts() {
            return PostCategoryModel::with('Post')
                ->get()->each(function ($post_category) {
                    $post_category->Post->meta = $post_category->Post->PostMetas()->orderBy('version', 'desc')->first();
                    $post_category->Post->upvotes = $post_category->Post->PostVotes()->where('vote', true)->count();
                    $post_category->Post->downvotes = $post_category->Post->PostVotes()->where('vote', false)->count();
                    $post_category->Post->comment_count = $post_category->Post->PostComments()->count();
                });
        }

        public function View($id) {
            return redirect()->to('post/' . $id);
        }
    }
