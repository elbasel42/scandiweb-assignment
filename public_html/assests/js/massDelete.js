const checkedIds = [];

const checkbox = (event) => {
  const eventTarget = event.target;
  const isChecked = event.target.checked;
  const id = eventTarget.id.split("-")[1];
  const table = eventTarget.parentElement.classList[1];

  if (isChecked) {
    checkedIds.push([table, id]);
  } else {
    for (let index = 0; index < checkedIds.length; index++) {
      const box = checkedIds[index];
      const boxTable = box[0];
      const boxId = box[1];

      if (table == boxTable && boxId == id) {
        checkedIds.splice(index, 1);
        break;
      }
    }
  }
};

const massDelete = async () => {
  const response = await fetch("../../Controllers/MassDelete.php", {
    method: "post",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(checkedIds),
  });

  const text = await response.text();
  location.reload();
};
