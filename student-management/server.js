const express = require("express");
const dotenv = require("dotenv");
const connectDB = require("./dbConfig");
const studentRoutes = require("./routes/studentRoutes");

dotenv.config();
connectDB();

const app = express();
app.use(express.json());

app.use("/students", studentRoutes);

app.listen(process.env.PORT, () => {
  console.log(`Server running on port ${process.env.PORT}`);
});
