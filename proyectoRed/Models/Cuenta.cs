using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace proyectoRed.Models
{
    class Cuenta
    {
        private int idUsuario;
        private int idMultimedia;
        private string nombre;
        private string apellidos;
        private string email;
        private string telefono;
        private string genero;
        private string info;
        private DateTime updated_at;
        private DateTime created_at;
        private int id;

        public int IdUsuario { get => idUsuario; set => idUsuario = value; }
        public int IdMultimedia { get => idMultimedia; set => idMultimedia = value; }
        public string Nombre { get => nombre; set => nombre = value; }
        public string Apellidos { get => apellidos; set => apellidos = value; }
        public string Email { get => email; set => email = value; }
        public string Telefono { get => telefono; set => telefono = value; }
        public string Genero { get => genero; set => genero = value; }
        public string Info { get => info; set => info = value; }
        public DateTime Updated_at { get => updated_at; set => updated_at = value; }
        public DateTime Created_at { get => created_at; set => created_at = value; }
        public int Id { get => id; set => id = value; }
    }
}
