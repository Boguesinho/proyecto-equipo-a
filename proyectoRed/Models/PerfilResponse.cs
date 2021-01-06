using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace proyectoRed.Models
{
    class PerfilResponse
    {
        private int idUsuario;
        private String ruta;
        private String nombre;
        private String apellidos;
        private String email;
        private String telefono;
        private String genero;
        private String info;


        public int IdUsuario { get => idUsuario; set => idUsuario = value; }

        public String Ruta { get => ruta; set => ruta = value; }
        public String Nombre { get => nombre; set => nombre = value; }
        public String Apellidos { get => apellidos; set => apellidos = value; }
        public String Email { get => email; set => email = value; }
        public String Telefono { get => telefono; set => telefono = value; }
        public String Genero { get => genero; set => genero = value; }
        public String Info { get => info; set => info = value; }
    }
}
