<?php
class RichestPeoples extends Controller
{
  // Properties, field
  private $peopleModel;

  // Dit is de constructor
  public function __construct()
  {
    $this->peopleModel = $this->model('RichestPeople');
  }

  public function index()
  {
    $richestPeople = $this->peopleModel->getRichestPeople();

    $rows = '';
    foreach ($richestPeople as $value) {
      $rows .= "<tr>
                  <td>$value->Name</td>
                  <td>$value->Networth</td>
                  <td>$value->MyAge</td>
                  <td>$value->Company</td>
                  <td><a href='" . URLROOT . "/RichestPeoples/delete/$value->Id'>delete</a></td>

                </tr>";
    }

    $data = [
      'title' => "De vijf rijkste mensen ter Wereld",
      'richestPeople' => $rows
    ];
    $this->view('RichestPeoples/index', $data);
  }

  public function delete($id)
  {
    $result = $this->peopleModel->deleteRichestPerson($id);

    if ($result) {
      echo "Het record is verwijderd uit de database";
      header("Refresh: 3; URL=" . URLROOT . "/RichestPeoples/index");
    } else {
      echo "Internal servererror, het record is niet verwijderd";
      header("Refresh: 3; URL=" . URLROOT . "/RichestPeoples/index");
    }
  }
}
