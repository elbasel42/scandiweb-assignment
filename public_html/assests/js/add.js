document.addEventListener("keydown", (e) => {
  if (e.key === "Enter") {
    add();
  }
});

document.getElementById("type").addEventListener("input", (e) => {
  const type = e.target.value;
  toggleType(type);
});

const removeExtraElements = () => {
  try {
    const secondContainer = document.getElementById("secondContainer");
    const thirdContainer = document.getElementById("thirdContainer");
    document.querySelector(".form-container").removeChild(secondContainer);
    document.querySelector(".form-container").removeChild(thirdContainer);
  } catch (error) {}
};

const toggleType = (type) => {
  const formContainer = document.querySelector(".form-container");
  const infoDiv = document.getElementById("info-div");
  const container = document.getElementById("varible-input");
  container.classList = "";
  container.innerHTML = "";

  const label = document.createElement("label");
  const input = document.createElement("input");
  input.type = "number";

  removeExtraElements();

  switch (type) {
    case "Books":
      label.textContent = "Weight: ";
      input.id = "weight";
      input.name = "weight";
      container.classList.add("Books");
      infoDiv.textContent = "Please provide weight.";
      break;
    case "Discs":
      label.textContent = "Size: ";
      input.name = "size";
      input.id = "size";
      container.classList.add("Discs");
      infoDiv.textContent = "Please provide size.";
      break;
    case "Furniture":
      //! Height
      label.textContent = "Height";
      input.name = "height";
      input.id = "height";
      container.classList.add("Furniture");
      infoDiv.textContent = "Please provide dimensions.";

      //! Width
      const secondContainer = document.createElement("div");
      secondContainer.id = "secondContainer";
      const secondLabel = document.createElement("label");
      const secondInput = document.createElement("input");
      secondLabel.textContent = "Width: ";
      secondInput.type = "number";
      secondInput.name = "width";
      secondInput.id = "width";
      // secondInput.placeholder = "width";
      secondContainer.append(secondLabel, secondInput);

      //! Length
      const thirdContainer = document.createElement("div");
      thirdContainer.id = "thirdContainer";
      const thirdLabel = document.createElement("label");
      const thirdInput = document.createElement("input");
      thirdLabel.textContent = "Length: ";
      thirdInput.type = "number";
      thirdInput.name = "length";
      thirdInput.id = "length";
      // thirdInput.placeholder = "length";
      thirdContainer.append(thirdLabel, thirdInput);

      // ! Append to container
      formContainer.append(secondContainer, thirdContainer);
  }

  container.appendChild(label);
  container.appendChild(input);
};

const add = () => {
  const sku = document.getElementById("sku").value;
  const name = document.getElementById("name").value;
  const price = document.getElementById("price").value;
  const table = document.getElementById("type").value;
  const errorOutput = document.getElementById("error");

  if (sku == "" || name == "" || price == "" || table == "") {
    errorOutput.textContent = "please fill out all fields";
  } else {
    errorOutput.textContent = "";
  }

  const product = { sku, name, price, table };
  switch (table) {
    case "Books":
      const weight = document.getElementById("weight").value;
      if (weight == "") {
        errorOutput.textContent = "Please enter weight!";
        return;
      }
      insertProduct({ ...product, weight });
      break;
    case "Discs":
      const size = document.getElementById("size").value;
      if (size == "") {
        errorOutput.textContent = "Please enter size!";
        return;
      }
      insertProduct({ ...product, size });
      break;
    case "Furniture":
      const height = document.getElementById("height").value;
      const width = document.getElementById("width").value;
      const length = document.getElementById("length").value;

      if (height == "" || width == "" || length == "") {
        errorOutput.textContent = "Please enter all dimensions!";
        return;
      }
      insertProduct({ ...product, height, width, length });
  }
};

const insertProduct = async (productInfo) => {
  const addButton = document.getElementById("add-button");
  addButton.disabled = "true";
  const response = await fetch("../../Controllers/InsertProduct.php", {
    method: "post",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(productInfo),
  });

  const text = await response.text();
  if (text == "1062") {
    document.getElementById("error").textContent =
      "Sku is already in database, please choose another.";
    return;
  } else if (text == "1") {
    window.location.replace("./index.php");
  }

  console.log({ text });
  addButton.disabled = "false";
  console.log({ addButton });
};

toggleType("Books");
