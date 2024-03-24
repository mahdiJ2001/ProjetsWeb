const express = require('express');
const mongoose = require('mongoose');
const bodyParser = require('body-parser');
const cors = require('cors');

const app = express();
const PORT = process.env.PORT || 3000;


const corsOptions = {
    origin: '*',
    methods: 'GET,HEAD,PUT,PATCH,POST,DELETE',
    credentials: true,
    optionsSuccessStatus: 204,
  };



app.use(cors(corsOptions));
app.use(bodyParser.json());

mongoose.connect('mongodb://127.0.0.1:27017/portfolioDB');
console.log('CONNECTÉ A MONGODB ');

const contactSchema = new mongoose.Schema({
    nom: String,
    prenom: String,
    telephone: String,
    email: String,
    dateNaissance: Date,
    nbEnfants: Number
});

const Contact = mongoose.model('Contact', contactSchema);

app.post('/api/contacts', async (req, res) => {
    try {
        console.log('Received a POST request:', req.body);

        const newContact = new Contact(req.body);
        const savedContact = await newContact.save();
        res.json(savedContact);
    } catch (error) {
        console.log('ERROR POST request:');
        res.status(500).json({ error: error.message });
    }
});

app.get('/api/contacts', async (req, res) => {
    try {
        const contacts = await Contact.find();
        res.json(contacts);
    } catch (error) {
        res.status(500).json({ error: error.message });
    }
});

app.listen(PORT, () => {
    console.log(`Server is running on port ${PORT}`);
});