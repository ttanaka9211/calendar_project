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
    public $modalUpdateStatus;

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
     * openUpdateModal
     *該当の生徒の情報をモデルを利用して取得.
     *
     * @param mixed $id
     *
     * @return void
     */
    public function openUpdateModal($id)
    {
        $student = Student::where('id', $id)->first();
        $this->ids = $student->id;
        $this->firstname = $student->firstname;
        $this->lastname = $student->lastname;
        $this->email = $student->email;
        $this->phone = $student->phone;
        $this->modalUpdateStatus = true;
    }

    /**
     * closeUpdateModal
     * updateModalを閉じる.
     *
     * @return void
     */
    public function closeUpdateModal()
    {
        $this->modalUpdateStatus = false;
    }

    /**
     * update
     *バリデーション通過後、更新処理。
     *
     * @return void
     */
    public function update()
    {
        $validateData = $this->validate([
            'firstname' => 'required',
            'lastname ' => 'required',
            'email    ' => 'required|email',
            'firstname' => 'required',
        ]);
        if ($this->ids) {
            $student = Student::find($this->ids);
            $student->update([
                'firstname' => $this->firstname,
                'lastname ' => $this->lastname,
                'email    ' => $this->email,
                'phone    ' => $this->phone,
            ]);
            session()->flash('message', '生徒の編集に成功しました。');
            $this->resetInputFields();
            $this->closeUpdateModal();
        }
    }

    /**
     * delete
     * 生徒情報削除.
     *
     * @param mixed $id
     *
     * @return void
     */
    public function delete($id)
    {
        if ($id) {
            Student::where('id', $id)->delete();
            session()->flash('message', '削除に成功しました。');
        }
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
