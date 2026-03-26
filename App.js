import './App.css';
import { useState, useEffect } from "react";

function App() {

  const [articulos, setArticulos] = useState([]);  
  const [busqueda, setBusqueda]   = useState("");

  useEffect(() => {                                
    fetch("http://localhost/cp1/get_articulos.php")
      .then(r => r.json())
      .then(data => setArticulos(data));
  }, []);

  return (                                   
    <div>
      <input placeholder="Buscar..." onChange={e => setBusqueda(e.target.value)} />
      <ul>
        {articulos
          .filter(a => a.descripcion.toLowerCase().includes(busqueda.toLowerCase()))
          .map(a => <li key={a.codigo_articulo}>{a.descripcion}</li>)
        }
      </ul>
    </div>
  );
}

export default App;