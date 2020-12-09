<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Livewire\Component;

class Students extends Component
{
    public $ids;
    public $firstname;
    public $lastname;
    public $email;
    public $phone;
    public $modalStatus;

    /**
     * openModal
     * modalStatusをtrueにしmodalを表示する.
     *
     * @return true
     */
    public function openModal()
    {
        $this->resetInputFields();
        $this->modalStatus = true;
    }

    /**
     * closeModal
     * modalStatusをfalseにし、modalを閉じる.
     *
     * @return false
     */
    public function closeModal()
    {
        $this->modalStatus = false;
    }

    /**
     * resetInputFields
     * Inputタグの中身を空にする.
     *
     * @return void
     */
    public function resetInputFields()
    {
        $this->firstname = '';
        $this->lastname = '';
        $this->email = '';
        $this->phone = '';
    }

    /**
     * store
     * バリデーションをした後に、生徒のデータを保存.
     *
     * @return void
     */
    public function store()
    {
        $validateData = $this->validate([
        'firstname' => 'required',
        'lastname' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
    ]);

        Student::create($validateData);
        session()->flash('message', '新規作成に成功しました。');
        $this->resetInputFields();
        $this->closeModal();
    }

    /**
     * render.
     *
     * @return void
     */
    public function render()
    {
        $students = Student::orderBy('id', 'DESC')->get();

        return view('livewire.students.index', compact('students'));
    }
}
