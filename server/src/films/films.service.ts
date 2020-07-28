import {HttpException, HttpStatus, Injectable} from '@nestjs/common';
import { InjectRepository } from '@nestjs/typeorm';
import {DeleteResult, Repository, UpdateResult} from 'typeorm';
import {Film} from "../entity/Film.entity";

@Injectable()
export class FilmsService {

    constructor(
        @InjectRepository(Film)
        private filmRepository: Repository<Film>,
    ) {}

    async  findAll() : Promise<Film[]> {
        return this.filmRepository.find({ relations: ["korisnik", "reziser","zanr"] });
    }

    async findOne(id: number): Promise<Film> {
       const film = await this.filmRepository.findOne(id, { relations: ["korisnik", "reziser","zanr"] })
       if (!film){
           throw new HttpException(
               "Film with given id not found",
               HttpStatus.BAD_REQUEST
           )
       }
       return film;
}

    // insert reziser first!!
    // Zanr and korisnik will always be in the base
    async create(film:Film) : Promise<boolean>{
        try {
            const f = await this.filmRepository.save(film);
        }
        catch (e) {
            throw new HttpException(
            e.message,
            HttpStatus.SERVICE_UNAVAILABLE
        );}
        return true;
    }


    async remove(id:number) : Promise<boolean>{
        const film = await this.filmRepository.delete(id)
        if (film.raw.affectedRows === 0){
            throw new HttpException(
                "Film with given id not found",
                HttpStatus.BAD_REQUEST
            )
        }
        return true;
    }

    async update(film: Film, id: any): Promise<boolean> {
        try {
            const result = await this.filmRepository.update(id, film);
            if (result.raw.affectedRows === 0) {
                throw new HttpException(
                    'Film with given id not found',
                    HttpStatus.NOT_FOUND
                );
            }
            return true;
        }
        catch (error)
            {
                if (error instanceof HttpException && error.getStatus() == HttpStatus.NOT_FOUND) throw error;
                throw new HttpException(
                    error.message,
                    HttpStatus.SERVICE_UNAVAILABLE
                );
            }
        }
}
